<?php

namespace App\Http\Controllers\Customer;

use App\Constants\WarehouseRequest as WarehouseRequestConstant;
use App\Http\Controllers\Controller;
use App\Models\DeliveryInbound;
use App\Models\DeliveryInboundItem;
use App\Models\Item;
use App\Models\Warehouse;
use App\Models\WarehouseRequest;
use App\Models\WarehouseRequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class DeliveryInboundController extends Controller
{
    public function list()
    {
        $user = Auth::user();

        $deliveryInbounds = DeliveryInbound::with('warehouse')
            ->where('customer_id', $user->customerDetails->id)
            ->get();
        return view('delivery_inbound.list', ['deliveryInbounds' => $deliveryInbounds]);
    }

    public function form($id)
    {   
        $user = Auth::user();
        $warehouse_request_lists = WarehouseRequest::with('warehouse')
            ->where('customer_id', $user->customerDetails->id)
            ->get();
        $deliveryInbound = null;

        return view('delivery_inbound.form', compact('warehouse_request_lists', 'deliveryInbound'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        try {
            DB::beginTransaction();

            $deliveryInbound = new DeliveryInbound();
            $deliveryInbound->customer_id = $user->customerDetails->id;
            $deliveryInbound->warehouse_id = $request->input('warehouse_id');
            $deliveryInbound->status = 'PENDING';
            $deliveryInbound->fill($request->input());
            $deliveryInbound->save();

            foreach ($request->input('deliveryOrderItem') as $itemId => $qtyToDeliver) {
                if (!empty($qtyToDeliver)) {
                    $newDoItem = new DeliveryInboundItem();
                    $newDoItem->delivery_inbound_id = $deliveryInbound->id;
                    $newDoItem->item_id = $itemId;
                    $newDoItem->quantity = $qtyToDeliver;
                    $deliveryInbound->deliveryInboundItems()->save($newDoItem);
                }
            }

            DB::commit();
        } catch (Exception $error) {
            Log::error('Error creating delivery inbound');
            Log::error($error);
            DB::rollBack();
            throw new Exception($error);
        }
        return redirect()->route('customer.delivery_inbounds.list');
    }

    public function details($id)
    {
        $user = Auth::user();
        $deliveryInbound = DeliveryInbound::with(['deliveryInboundItems.item', 'warehouse'])
            ->where('customer_id', $user->customerDetails->id)
            ->find($id);
        return view('delivery_inbound.customer_details', ['deliveryInbound' => $deliveryInbound]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $deliveryInbound = DeliveryInbound::with(['deliveryInboundItems.item', 'warehouse'])
                ->where('customer_id', $user->customerDetails->id)
                ->find($id);
            $deliveryInbound->status = 'PENDING';

            $inboundItemUpdates = $request->input('deliveryInboundItems');
            foreach ($deliveryInbound->deliveryInboundItems as $deliveryInboundItem) {
                if (empty($inboundItemUpdates[$deliveryInboundItem->id])) {
                    $deliveryInboundItem->delete();
                } else {
                    $deliveryInboundItem->quantity = $inboundItemUpdates[$deliveryInboundItem->id];
                    $deliveryInboundItem->save();
                }
            }
            $deliveryInbound->save();

            DB::commit();
        } catch (Exception $error) {
            Log::error('Error creating delivery inbound');
            Log::error($error);
            DB::rollBack();
            throw new Exception($error);
        }
        return redirect()->route('customer.delivery_inbounds.list');
    }

    public function warehouse_request_info(Request $request, $request_id = null)
    {
        if(isset($request_id) && !empty($request_id)){
            $warehouse_request = WarehouseRequest::with('warehouse')
                ->where('id', $request_id)
                ->find($request_id);
    
            $warehouse_request_items = WarehouseRequestItem::with('item')
                ->where('warehouse_request_id', $warehouse_request->id)
                ->get();

            return view('delivery_inbound._warehouse_request_lists', [
                    'warehouse_request' => $warehouse_request,
                    'warehouse_request_items' => $warehouse_request_items
                ]);
            
        }

    }
}

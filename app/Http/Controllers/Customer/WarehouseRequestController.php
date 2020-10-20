<?php

namespace App\Http\Controllers\Customer;

use App\Constants\WarehouseRequest as WarehouseRequestConstant;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Warehouse;
use App\Models\WarehouseRequest;
use App\Models\WarehouseRequestItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarehouseRequestController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $warehouseRequests = WarehouseRequest::where('customer_id', $user->customerDetails->id)
            ->with(['customer', 'warehouse.owner'])->get();
        return view('warehouse_request.list', ['warehouseRequests' => $warehouseRequests]);
    }

    public function form($id)
    {
        $user = Auth::user();
        $warehouseRequest = new WarehouseRequest();
        $warehouses = Warehouse::with(['owner'])
            ->whereDoesntHave('warehouseRequests', function ($q) use ($user) {
                $q->where('customer_id', $user->customerDetails->id)
                    ->whereIn('status', [WarehouseRequestConstant::PENDING, WarehouseRequestConstant::APPROVED]);
            })
            ->get();
        $items = Item::where('customer_id', $user->customerDetails->id)->get();
        return view('warehouse_request.form', ['warehouseRequest' => $warehouseRequest, 'warehouses' => $warehouses, 'items' => $items]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        try {
            DB::beginTransaction();

            $warehouseRequest = WarehouseRequest::where('customer_id', $user->customerDetails->id)
                ->where('warehouse_id', $request->input('warehouseId'))
                ->first();
            if (!$warehouseRequest) {
                $warehouseRequest = new WarehouseRequest();
                $warehouseRequest->customer_id = $user->customerDetails->id;
                $warehouseRequest->warehouse_id = $request->input('warehouseId');
            }
            $warehouseRequest->status = WarehouseRequestConstant::PENDING;
            $warehouseRequest->save();

            WarehouseRequestItem::where('warehouse_request_id', $warehouseRequest->id)->delete();

            foreach ($request->input('itemIds') as $itemId => $quantity) {
                $warehouseRequestItem = new WarehouseRequestItem();
                $warehouseRequestItem->item_id = $itemId;
                $warehouseRequestItem->quantity = $quantity;
                $warehouseRequest->warehouseRequestItems()->save($warehouseRequestItem);
            }

            DB::commit();
        } catch (Exception $error) {
            DB::rollBack();
        }

        return redirect()->route('customer.warehouse_requests.list');
    }

    public function details($id)
    {
        $warehouseRequest = WarehouseRequest::with(['warehouseRequestItems.item'])->find($id);
        return view('warehouse_request.details', ['warehouseRequest' => $warehouseRequest]);
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use App\Models\WarehouseImage;
use App\Models\WarehouseRequest;
use App\Models\WarehouseRequestItem;
use App\Models\Item;
use App\Helpers\StorageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function list()
    {
        session()->forget('item');
        $user = Auth::user();
        $warehouses = Warehouse::with(['warehouseRequests' => function ($q) use ($user) {
            $q->where('customer_id', $user->customerDetails->id);
        }])->get();
        return view('customer_warehouse.list', ['warehouses' => $warehouses]);
    }
    
    public function details($id)
    {
        $user = Auth::user();
        session()->forget('item');
        $warehouse_image_parsed = array();
        $warehouse = Warehouse::with(['warehouseRequests' => function ($q) use ($user) {
            $q->where('customer_id', $user->customerDetails->id);
        }])->find($id);
        $warehouse_image = WarehouseImage::where('warehouse_id', $warehouse->id)->get();

        foreach($warehouse_image as $key => $warehouse_images){
            $warehouse_image_parsed[$key] = StorageHelper::getDo('do_spaces',$warehouse_images['name']);
        }

        return view('customer_warehouse.details', ['warehouse' => $warehouse, 'warehouse_images' => $warehouse_image_parsed]);
    }
    
    public function request($id)
    {
        $user = Auth::user();
        $warehouse = Warehouse::with(['warehouseRequests' => function ($q) use ($user) {
            $q->where('customer_id', $user->customerDetails->id);
        }])->find($id);
        return view('customer_warehouse.request', ['warehouse' => $warehouse]);
    }

    public function request_sku($id)
    {
        $user = Auth::user();
        $warehouse = Warehouse::with(['warehouseRequests' => function ($q) use ($user) {
            $q->where('customer_id', $user->customerDetails->id);
        }])->find($id);
        $items = Item::where('customer_id', $user->customerDetails->id)->get();
        return view('customer_warehouse.request_sku', ['warehouse' => $warehouse, 'items' => $items]);
    }

    public function store_sku(Request $request, $id)
    {
        $user = Auth::user();
        $item_data = Item::where('id', $request->item_id)->find($request->item_id);
        $array_item_id = session()->get('item.id');
        if(isset($array_item_id) && in_array($request->item_id, $array_item_id)){
            $arr_key = array_search($request->item_id, $array_item_id);
            $temp_arr = session()->get('item');
            $temp_arr["id"][$arr_key] = $item_data->id;
            $temp_arr["sku"][$arr_key] = $item_data->system_sku;
            $temp_arr["name"][$arr_key] = $item_data->name;
            $temp_arr["quantity"][$arr_key] = $request->quantity;
            $request->session()->forget('item');
            $request->session()->put('item', $temp_arr);
        }else{
            $request->session()->push('item.id', $item_data->id);
            $request->session()->push('item.sku', $item_data->system_sku);
            $request->session()->push('item.name', $item_data->name);
            $request->session()->push('item.quantity', $request->quantity);
        }
        
        $warehouse = Warehouse::with(['warehouseRequests' => function ($q) use ($user) {
            $q->where('customer_id', $user->customerDetails->id);
        }])->find($id);
        return redirect()->route('customer.customer_warehouses.request', $id);
    }
    
    public function store_request(Request $request, $id)
    {
        $user = Auth::user();
        $warehouse_request = new WarehouseRequest();
        $warehouse_request->customer_id = $user->customerDetails->id;
        $warehouse_request->warehouse_id = $id;
        if(isset($request->storage_only) && !empty($request->storage_only)) $warehouse_request->storage_only = $request->storage_only;
        $warehouse_request->save();

        $item_data = session()->get('item');
        for($i=0; $i<(count($item_data['id'])); $i++){
            $warehouse_request_item = new WarehouseRequestItem();
            $warehouse_request_item->warehouse_request_id = $warehouse_request->id;
            $warehouse_request_item->item_id = $item_data['id'][$i];
            $warehouse_request_item->quantity = $item_data['quantity'][$i];
            $warehouse_request_item->save();
        }

        return redirect()->route('customer.customer_warehouses.list', $id);
    }
}
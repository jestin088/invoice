<?php

use App\Constants\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});
Route::get('/invoices', function () {
    return view('invoices');
});

Route::resource('invoices', 'InvoiceController');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // Route for admin
    Route::group(['middleware' => ['role.check:' . Role::ADMIN], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        // Users
        Route::get('/users', 'UserController@list')->name('users.list');
        Route::get('/users/{id}/details', 'UserController@details')->name('users.details');

        // Warehouses
        Route::get('/warehouses', 'WarehouseController@list')->name('warehouses.list');
        Route::get('/warehouses/{id}/details', 'WarehouseController@details')->name('warehouses.details');

        // Warehouse Requests
        Route::get('/warehouse_requests', 'WarehouseRequestController@list')->name('warehouse_requests.list');
        Route::get('/warehouse_requests/{id}/details', 'WarehouseRequestController@details')->name('warehouse_requests.details');
        
        // Items
        Route::get('/items', 'ItemController@list')->name('items.list');
        Route::get('/items/{id}/details', 'ItemController@details')->name('items.details');
        
        // Inventories
        Route::get('/inventories', 'InventoryController@list')->name('inventories.list');
        Route::get('/inventories/{id}/details', 'InventoryController@details')->name('inventories.details');
        
        // Delivery Inbounds
        Route::get('/delivery_inbounds', 'DeliveryInboundController@list')->name('delivery_inbounds.list');
        
        // Couriers
        Route::get('/couriers', 'CourierController@list')->name('couriers.list');
        Route::get('/couriers/{id}/details', 'CourierController@details')->name('couriers.details');
        Route::get('/couriers/{id}/form', 'CourierController@form')->name('couriers.form');
        Route::post('/couriers/create', 'CourierController@create')->name('couriers.create');
        Route::put('/couriers/{id}/update', 'CourierController@update')->name('couriers.update');
        
        //Warehouse Services
        Route::get('/services', 'ServiceController@list')->name('services.list');
        Route::get('/services/{id}/details', 'ServiceController@details')->name('services.details');
        Route::get('/services/{id}/form', 'ServiceController@form')->name('services.form');
        Route::post('/services/create', 'ServiceController@create')->name('services.create');
        Route::put('/services/{id}/update', 'ServiceController@update')->name('services.update');

        
    });
    
    // Route for warehouse owners
    Route::group(['middleware' => ['role.check:' . Role::OWNER], 'namespace' => 'Owner', 'prefix' => 'owner', 'as' => 'owner.'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        
        // Warehouses
        Route::get('/warehouses', 'WarehouseController@list')->name('warehouses.list');
        Route::get('/warehouses/{id}/form', 'WarehouseController@form')->name('warehouses.form');
        Route::get('/warehouses/{id}/shipment_form', 'WarehouseController@shipment_form')->name('warehouses.shipment_form');
        Route::post('/warehouses/create', 'WarehouseController@create')->name('warehouses.create');
        Route::put('/warehouses/create_shipment', 'WarehouseController@create_shipment')->name('warehouses.create_shipment');
        Route::get('/warehouses/{id}/details', 'WarehouseController@details')->name('warehouses.details');
        Route::put('/warehouses/{id}/update', 'WarehouseController@update')->name('warehouses.update');
        Route::post('/warehouses/{warehouse_id}/delete_shipment_time', 'WarehouseController@delete_shipment_time')->name('warehouses.delete_shipment_time');
        
        // Warehouse Requests
        Route::get('/warehouse_requests', 'WarehouseRequestController@list')->name('warehouse_requests.list');
        Route::get('/warehouse_requests/{id}/details', 'WarehouseRequestController@details')->name('warehouse_requests.details');
        Route::put('/warehouse_requests/{id}/update', 'WarehouseRequestController@update')->name('warehouse_requests.update');
        
        // Inventories
        Route::get('/inventories', 'InventoryController@list')->name('inventories.list');
        Route::get('/inventories/{id}/details', 'InventoryController@details')->name('inventories.details');
        
        // Delivery Inbounds
        Route::get('/delivery_inbounds', 'DeliveryInboundController@list')->name('delivery_inbounds.list');
        Route::get('/delivery_inbounds/{id}/details', 'DeliveryInboundController@details')->name('delivery_inbounds.details');
        Route::put('/delivery_inbounds/{id}/update', 'DeliveryInboundController@update')->name('delivery_inbounds.update');
    });
    
    // Route for warehouse customers
    Route::group(['middleware' => ['role.check:' . Role::CUSTOMER], 'namespace' => 'Customer', 'prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        
        // Items
        Route::get('/items', 'ItemController@list')->name('items.list');
        Route::get('/items/{id}/form', 'ItemController@form')->name('items.form');
        Route::post('/items/create', 'ItemController@create')->name('items.create');
        Route::get('/items/{id}/details', 'ItemController@details')->name('items.details');
        Route::put('/items/{id}/update', 'ItemController@update')->name('items.update');
        
        // Inventories
        Route::get('/inventories', 'InventoryController@list')->name('inventories.list');
        Route::get('/inventories/{id}/details', 'InventoryController@details')->name('inventories.details');
        
        // Delivery Inbounds
        Route::get('/delivery_inbounds', 'DeliveryInboundController@list')->name('delivery_inbounds.list');
        Route::get('/delivery_inbounds/{id}/form', 'DeliveryInboundController@form')->name('delivery_inbounds.form');
        Route::post('/delivery_inbounds/create', 'DeliveryInboundController@create')->name('delivery_inbounds.create');
        Route::get('/delivery_inbounds/{id}/details', 'DeliveryInboundController@details')->name('delivery_inbounds.details');
        Route::put('/delivery_inbounds/{id}/update', 'DeliveryInboundController@update')->name('delivery_inbounds.update');
        Route::post('/warehouse_request_info/{request_id?}', 'DeliveryInboundController@warehouse_request_info')->name('warehouse_request.info');
        
        // Warehouse
        Route::get('/warehouses', 'WarehouseController@list')->name('customer_warehouses.list');
        Route::get('/warehouses/{id}/details', 'WarehouseController@details')->name('customer_warehouses.view');
        Route::get('/warehouses/{id}/request', 'WarehouseController@request')->name('customer_warehouses.request');
        Route::get('/warehouses/{id}/request_sku', 'WarehouseController@request_sku')->name('customer_warehouses.request_sku');
        Route::post('/warehouses/{id}/store_sku', 'WarehouseController@store_sku')->name('customer_warehouses.store_sku');
        Route::post('/warehouses/{id}/store_request', 'WarehouseController@store_request')->name('customer_warehouses.store_request');
        
        // Warehouse Requests
        Route::get('/warehouse_requests', 'WarehouseRequestController@list')->name('warehouse_requests.list');
        Route::get('/warehouse_requests/{id}/form', 'WarehouseRequestController@form')->name('warehouse_requests.form');
        Route::post('/warehouse_requests/create', 'WarehouseRequestController@create')->name('warehouse_requests.create');
        Route::get('/warehouse_requests/{id}/details', 'WarehouseRequestController@details')->name('warehouse_requests.details');
    });
});

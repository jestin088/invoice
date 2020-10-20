@if(isset($warehouse_request_items) && !empty($warehouse_request_items))
<label for="inputItems" class="col-sm-2 col-form-label"> {{ $warehouse_request->warehouse->name }} </label>
<div class="col-sm-10">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warehouse_request_items as $warehouse_request_item)
            <tr>
                <td>{{ $warehouse_request_item->item[0]->name }}</td>
                <td>{{ $warehouse_request_item->item[0]->user_sku }}</td>
                <td>{{ $warehouse_request_item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@extends('layouts.template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Warehouse Requests</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('warehouse_requests.list')) }}">Warehouse Request</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Warehouse Request {{ $warehouseRequest->id }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route(BladeAcl::getRoute('warehouse_requests.create')) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputWarehouseId" class="col-sm-2 col-form-label">Warehouse</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="warehouseId">
                                        @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }} ({{ $warehouse->owner->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputItemIds" class="col-sm-2 col-form-label">Items</label>
                                <div class="col-sm-10">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <input type="number" class="form-control" name="itemIds[{{ $item->id }}]">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                            <button type="submit" class="btn btn-primary float-sm-right">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
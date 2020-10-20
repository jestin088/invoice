@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('inventories.list')) }}">Inventory</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Inventory (ID: {{ $inventory->id }})</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputItem" class="col-sm-2 col-form-label">Item</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputItem" value="{{ $inventory->item->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputWarehouse" class="col-sm-2 col-form-label">Warehouse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputWarehouse" value="{{ $inventory->warehouse->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputInitialQuantity" class="col-sm-2 col-form-label">Initial Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputInitialQuantity" value="{{ $inventory->initial_quantity }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAvailableQuantity" class="col-sm-2 col-form-label">Available Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAvailableQuantity" value="{{ $inventory->available_quantity }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Inventory Logs</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Date</td>
                                                <td>Quantity Before</td>
                                                <td>Quantity Change</td>
                                                <td>Quantity After</td>
                                            </tr>
                                            @foreach($inventory->inventoryLogs as $inventoryLog)
                                            <tr>
                                                <td>{{ $inventoryLog->created_at }}</td>
                                                <td>{{ $inventoryLog->quantity_before }}</td>
                                                <td>{{ $inventoryLog->quantity_change }}</td>
                                                <td>{{ $inventoryLog->quantity_after }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
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

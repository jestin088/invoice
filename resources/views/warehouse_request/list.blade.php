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
                        <li class="breadcrumb-item"><a href="#">Warehouse Request</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @roleCheck(RoleConstant::CUSTOMER)
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('customer.warehouse_requests.form', 0) }}" class="btn btn-primary btn-sm float-sm-right">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @endRoleCheck
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th>Warehouse</th>
                            <th>Customer</th>
                            <th>Owner</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($warehouseRequests as $warehouseRequest)
                        <tr>
                            <td>{{ $warehouseRequest->warehouse->name }}</td>
                            <td>{{ $warehouseRequest->customer->name }}</td>
                            <td>{{ $warehouseRequest->warehouse->owner->name }}</td>
                            <td>{{ $warehouseRequest->status }}</td>
                            <td>
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('customer_warehouses.details'), $warehouseRequest->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

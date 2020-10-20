@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Delivery Inbounds</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Delivery Inbound</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @roleCheck(RoleConstant::CUSTOMER)
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route(BladeAcl::getRoute('delivery_inbounds.form'), 0) }}" class="btn btn-primary btn-sm float-sm-right">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @endRoleCheck
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                
                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-truck"></i>
                    List
                    </h3>
                </div>
                <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <tr>
                            <th>Warehouse</th>
                            <th>Notes</th>
                            <th>ETA</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($deliveryInbounds as $deliveryInbound)
                        <tr>
                            <td>{{ $deliveryInbound->warehouse->name }}</td>
                            <td>{{ $deliveryInbound->notes }}</td>
                            <td>{{ $deliveryInbound->eta }}</td>
                            <td>{{ $deliveryInbound->status }}</td>
                            <td>
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('delivery_inbounds.details'), $deliveryInbound->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <!-- @roleCheck(RoleConstant::CUSTOMER)
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('delivery_inbounds.form'), $deliveryInbound->id) }}">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endRoleCheck -->
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

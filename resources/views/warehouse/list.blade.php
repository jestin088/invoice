@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Warehouses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @roleCheck(RoleConstant::OWNER)
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('owner.warehouses.form', 0) }}" class="btn btn-primary btn-sm float-sm-right">
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
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Country</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Postcode</th>
                            <th>Dimensions (L x W x H)</th>
                            <th>Area</th>
                            <th>Volume</th>
                            <th>Inventories</th>
                            @roleCheck(RoleConstant::CUSTOMER)
                            <th>Request Status</th>
                            @endRoleCheck
                            <th>Action</th>
                        </tr>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <td>{{ $warehouse->name }}</td>
                            <td>{{ $warehouse->contact_person }}</td>
                            <td>{{ $warehouse->contact_number }}</td>
                            <td>{{ $warehouse->country }}</td>
                            <td>{{ $warehouse->province }}</td>
                            <td>{{ $warehouse->city }}</td>
                            <td>{{ $warehouse->address }}</td>
                            <td>{{ $warehouse->postcode }}</td>
                            <td>
                                {{ floatval($warehouse->length) . ' ' . $warehouse->measurement_unit . ' x ' .
                                    floatval($warehouse->width) . ' ' . $warehouse->measurement_unit . ' x ' .
                                    floatval($warehouse->height) . ' ' . $warehouse->measurement_unit }}
                            </td>
                            <td>{{ floatval($warehouse->area) . ' ' . $warehouse->measurement_unit . '²' }}</td>
                            <td>{{ floatval($warehouse->volume) . ' ' . $warehouse->measurement_unit . '³' }}</td>
                            <td>{{ $warehouse->inventories_count }}</td>
                            @roleCheck(RoleConstant::CUSTOMER)
                            <td>{{ count($warehouse->warehouseRequests) > 0 ? $warehouse->warehouseRequests[0]->status : "NO REQUEST" }}</td>
                            @endRoleCheck
                            <td>
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('warehouses.details'), $warehouse->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @roleCheck(RoleConstant::OWNER)
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('warehouses.form'), $warehouse->id) }}">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endRoleCheck
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

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
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('warehouses.list')) }}">Warehouse</a></li>
                        <li class="breadcrumb-item active">Details</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Warehouse {{ $warehouse->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" value="{{ $warehouse->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContactPerson" class="col-sm-2 col-form-label">Contact Person</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputContactPerson" value="{{ $warehouse->contact_person }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContactNumber" class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputContactNumber" value="{{ $warehouse->contact_number }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCountry" value="{{ $warehouse->country }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputProvince" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputProvince" value="{{ $warehouse->province }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCity" value="{{ $warehouse->city }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" value="{{ $warehouse->address }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPostcode" class="col-sm-2 col-form-label">Postcode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPostcode" value="{{ $warehouse->postcode }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMeasurementUnit" class="col-sm-2 col-form-label">Measurement Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputMeasurementUnit" value="{{ $warehouse->measurement_unit }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLength" class="col-sm-2 col-form-label">Length</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputLength" value="{{ $warehouse->length }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputWidth" class="col-sm-2 col-form-label">Width</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputWidth" value="{{ $warehouse->width }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputHeight" class="col-sm-2 col-form-label">Height</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputHeight" value="{{ $warehouse->height }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputArea" class="col-sm-2 col-form-label">Area</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputArea" value="{{ $warehouse->area }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputVolume" class="col-sm-2 col-form-label">Volume</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputVolume" value="{{ $warehouse->volume }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Inventories</label>
                                    <div class="col-sm-10">
                                    <a href="{{ route(BladeAcl::getRoute('inventories.list')) }}" target="_blank">View</a>
                                    </div>
                                </div>
                            @roleCheck(RoleConstant::CUSTOMER)
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Usage Request</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputVolume" value="{{ count($warehouse->warehouseRequests) > 0 ? $warehouse->warehouseRequests[0]->status : "NO REQUEST" }}" disabled>
                            </div>
                            </div>
                            @endRoleCheck
                        </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                                <a class="btn btn-primary float-sm-right" href="{{ route(BladeAcl::getRoute('warehouses.details'), $warehouse->id) }}">Edit</a>
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

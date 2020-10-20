@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Warehouses Shipment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('owner.warehouses.form', $warehouse->id) }}">Warehouse {{ $warehouse->name }} Shipment Form</a></li>
                        <li class="breadcrumb-item active">{{ $warehouse->id ? 'Edit' : 'Create' }}</li>
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
                            <h3 class="card-title">Warehouse {{ $warehouse->name }} Shipment Time</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route('owner.warehouses.create_shipment') }}" enctype="multipart/form-data">
                            @csrf
                            @if($warehouse->id) @method('PUT') @endif
                            <div class="card-body">
                                <input type="hidden" name="warehouse_id" value="{{ $warehouse->id }}">
                                <div class="form-group row">
                                    <label for="shipment-day" class="col-sm-2 col-form-label">Day</label>
                                    <div class="col-sm-10">
                                        <select name="shipment_day" id="shipment-day" class="form-control">
                                            <option value="">--- Select Shipment Day ---</option>
                                            <option value="Monday"> Monday </option>
                                            <option value="Tuesday"> Tuesday </option>
                                            <option value="Wednesday"> Wednesday </option>
                                            <option value="Thursday"> Thursday </option>
                                            <option value="Friday"> Friday </option>
                                            <option value="Saturday"> Saturday </option>
                                            <option value="Sunday"> Sunday </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipment-time-start" class="col-sm-2 col-form-label">Shipment Start Time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" id="shipment-time-start" name="shipment_time_start" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="shipment-time-end" class="col-sm-2 col-form-label">Shipment End Time</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" id="shipment-time-end" name="shipment_time_end" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                                <button type="submit" class="btn btn-primary float-sm-right">Add</button>
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

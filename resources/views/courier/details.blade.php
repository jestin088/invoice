@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Couriers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('couriers.list')) }}">Courier</a></li>
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
                            <h3 class="card-title">Courier {{ $courier->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" value="{{ $courier->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRemarks" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputRemarks" value="{{ $courier->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                                <a class="btn btn-primary float-sm-right" href="{{ route(BladeAcl::getRoute('couriers.form'), $courier->id) }}">Edit</a>
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

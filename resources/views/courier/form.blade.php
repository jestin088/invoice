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
                        <li class="breadcrumb-item"><a href="{{ route('admin.couriers.list') }}">Courier</a></li>
                        <li class="breadcrumb-item active">{{ $courier->id ? 'Edit' : 'Create' }}</li>
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
                            <h3 class="card-title">Courier {{ $courier->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ $courier->id ? route('admin.couriers.update', $courier->id) : route('admin.couriers.create') }}" enctype="multipart/form-data">
                            @csrf
                            @if($courier->id) @method('PUT') @endif
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{ $courier->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFile" class="col-sm-2 col-form-label">Avatar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputFile" onchange="loadFile(event)" name="avatar">
                                        <p id="image-field" class="mt-2 d-none"><img id="image" width="200"/></p>
                                        @if(isset($courier->image_base64) && !empty($courier->image_base64))
                                            <p id="old-image-field" class="mt-2"><img width="200" src='data:image/jpeg;base64, <?=$courier->image_base64?>'/></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputRemarks" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="inputRemarks" name="remarks">{{ $courier->remarks }}</textarea>
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

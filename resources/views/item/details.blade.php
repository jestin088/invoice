@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Items</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('items.list')) }}">Item</a></li>
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
                            <h3 class="card-title">Item {{ $item->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" value="{{ $item->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputDescription" value="{{ $item->description }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNotes" class="col-sm-2 col-form-label">Notes</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNotes" value="{{ $item->notes }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUserSku" class="col-sm-2 col-form-label">User SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUserSku" value="{{ $item->user_sku }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAdminSku" class="col-sm-2 col-form-label">Admin SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAdminSku" value="{{ $item->admin_sku }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSystemSku" class="col-sm-2 col-form-label">System SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSystemSku" value="{{ $item->system_sku }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputOwner" class="col-sm-2 col-form-label">Owner</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputOwner" value="{{ $item->owner->name }}" disabled>
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

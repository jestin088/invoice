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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Item {{ $item->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ $item->id ? route(BladeAcl::getRoute('items.update'), $item->id) : route(BladeAcl::getRoute('items.create')) }}">
                            @csrf
                            @if($item->id) @method('PUT') @endif
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{ $item->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputDescription" name="description" value="{{ $item->description }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNotes" class="col-sm-2 col-form-label">Notes</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNotes" name="notes" value="{{ $item->notes }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUserSku" class="col-sm-2 col-form-label">User SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUserSku" name="user_sku" value="{{ $item->user_sku }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAdminSku" class="col-sm-2 col-form-label">Admin SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAdminSku" name="admin_sku" value="{{ $item->admin_sku }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSystemSku" class="col-sm-2 col-form-label">System SKU</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSystemSku" name="system_sku" value="{{ $item->system_sku }}">
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

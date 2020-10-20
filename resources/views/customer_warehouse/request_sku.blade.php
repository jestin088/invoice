@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Request SKU</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('customer.customer_warehouses.request', $warehouse->id) }}">Request SKU</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                            <h3 class="card-title">SKU Request for Warehouse {{ $warehouse->name }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route('customer.customer_warehouses.store_sku', $warehouse->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputSku" class="col-sm-2 col-form-label">SKU</label>
                                    <div class="col-md-10">
                                        <select name="item_id" id="inputSku" class="form-control">
                                            <option value="">--- Select SKU ---</option>
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}"> {{ $item->system_sku }} - {{ $item->name }}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputQuantity" name="quantity" value="">
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

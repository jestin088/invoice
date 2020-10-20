@extends('layouts.template')
@section('content')
<?php
    $sku_data = session()->get('item');
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Warehouses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('customer_warehouses.list')) }}">Warehouse</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route(BladeAcl::getRoute('customer_warehouses.view'),$warehouse->id) }}">{{ $warehouse->name }}</a></li>
                        <li class="breadcrumb-item active">Request Penggunaan Gudang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('customer.customer_warehouses.store_request', $warehouse->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-xs-12 p-3" >
                                        <div class="row">
                                            <div class="col-xs-12 col-lg-12 p-2">
                                                <img src="https://via.placeholder.com/150" style="max-width: none; height: 80px; border-radius: 38px;" alt="" class="img-responsive">
                                            </div>
                                            <div class="col-xs-12 col-lg-12 p-2" style="margin-top: 10px; font-size: 16px">
                                                <div class="row">
                                                    <div class="col-xs-6 col-lg-6"><h3>{{ $warehouse->name }}</h3></div>
                                                    @if(isset($warehouse->is_verified) && !empty($warehouse->is_verified))
                                                    <div class="col-xs-6 col-lg-6 text-right"><span class="badge badge-success">verified</span></div>
                                                    @else
                                                    <div class="col-xs-6 col-lg-6 text-right"><span class="badge badge-secondary">not verified</span></div>
                                                    @endif
                                                    <div class="col-xs-12 col-lg-12 "><strong>{{$warehouse->contact_number}}</strong></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 p-2">
                                                    <strong><h4>Sistem Penyimpanan Stock</h4></strong>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 p-2">
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" id="exampleRadios1" value="option1" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    <strong>Barcode oleh seller</strong><br/><small>Anda harus melakukan labeling sebelum pengiriman barang ke warehouse </small>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-lg-8 p-3" >
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h4>Upload SKU</h4>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="storage_only" value="1" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        <h4>Storage Only</h4>
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12"  style="margin-top: 10px">
                                                    <table class="table table-stripped">
                                                        <thead>
                                                            <tr>
                                                                <td><strong>SKU</strong></td>
                                                                <td><strong>Nama</strong></td>
                                                                <td><strong>Qty</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($sku_data) && !empty($sku_data))
                                                                @for($i=0; $i<(count($sku_data['id'])); $i++ )
                                                                    <tr>
                                                                        <td> {{ $sku_data['sku'][$i] }} </td>
                                                                        <td> {{ $sku_data['name'][$i] }} </td>
                                                                        <td> {{ $sku_data['quantity'][$i] }} </td>
                                                                    </tr>
                                                                @endfor
                                                            @else
                                                                <tr>
                                                                    <td colspan="3">Tidak ada sku</td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    <div class="col-lg-12 col-xs-12">
                                                        <!-- <button class='btn btn-outline-primary col-lg-12'>Tambah SKU</button> -->
                                                        <a class="btn btn-primary col-md-12" href="{{ route(BladeAcl::getRoute('customer_warehouses.request_sku'), $warehouse->id) }}"><i class="icon-comments-alt"></i>Tambah SKU</a>
                                                    </div>
                                                    <hr/>
                                                    <div class="col-md-12"  style="margin-top: 10px">
                                                        <button class="btn btn-default col-md-2">Batal</button>
                                                        <button class="btn btn-primary col-md-4">Kirim Pengajuan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

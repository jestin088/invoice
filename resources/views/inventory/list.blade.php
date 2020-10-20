@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inventories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">

                <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-cubes"></i>
                    List
                    </h3>
                </div>
                <div class="card-body p-0">
                <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <tr>
                            <th>Item</th>
                            <th>Warehouse</th>
                            <th>Quantity Available</th>
                            <th>Action</th>
                        </tr>
                        @foreach($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->item->name }}</td>
                            <td>{{ $inventory->warehouse->name }}</td>
                            <td>{{ $inventory->available_quantity }}</td>
                            <td>
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('inventories.details'), $inventory->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
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

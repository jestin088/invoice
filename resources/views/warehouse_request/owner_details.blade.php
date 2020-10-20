@extends('layouts.template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Warehouse Requests</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('warehouse_requests.list')) }}">Warehouse Request</a></li>
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
                        <h3 class="card-title">Warehouse Request {{ $warehouseRequest->id }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route(BladeAcl::getRoute('warehouse_requests.update'), $warehouseRequest->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputWarehouseId" class="col-sm-2 col-form-label">Warehouse</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="warehouseId" value="{{ $warehouseRequest->warehouse->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="status" value="{{ $warehouseRequest->status }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                            @roleCheck(RoleConstant::OWNER)
                            @if ($warehouseRequest->status === 'PENDING')
                            <button type="submit" name="status" value="APPROVE" class="btn btn-primary float-sm-right" style="margin-left: 10px">
                                Approve
                            </button>
                            <button type="submit" name="status" value="REJECT" class="btn btn-primary float-sm-right">
                                Reject
                            </button>
                            @endif
                            @endRoleCheck
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
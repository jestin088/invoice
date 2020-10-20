@extends('layouts.template')
@php
$editable = $deliveryInbound->status === 'DISPUTE' && Auth::user()->role === RoleConstant::CUSTOMER ? '' : 'disabled';
@endphp
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Delivery Inbounds</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('delivery_inbounds.list')) }}">Delivery Inbound</a></li>
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
                            <h3 class="card-title">Item {{ $deliveryInbound->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ route(BladeAcl::getRoute('delivery_inbounds.update'), $deliveryInbound->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Warehouse</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{ $deliveryInbound->warehouse->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputItems" class="col-sm-2 col-form-label">Items</label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($deliveryInbound->deliveryInboundItems as $deliveryInboundItem)
                                                <tr>
                                                    <td>{{ $deliveryInboundItem->item->name }}</td>
                                                    <td>{{ $deliveryInboundItem->item->user_sku }}</td>
                                                    <td><input type="number" class="form-control" id="inputName" name="name" value="{{ $deliveryInboundItem->quantity }}" {{ $editable }}></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCustomerNotes" class="col-sm-2 col-form-label">Customer Notes</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCustomerNotes" name="customer_notes" value="{{ $deliveryInbound->customer_notes }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputOwnerNotes" class="col-sm-2 col-form-label">Owner Notes</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputOwnerNotes" name="owner_notes" value="{{ $deliveryInbound->owner_notes }}" @if($deliveryInbound->status !== 'PENDING') disabled @endif>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEta" class="col-sm-2 col-form-label">ETA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEta" name="eta" value="{{ $deliveryInbound->eta }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
                                @if ($deliveryInbound->status === 'PENDING')
                                <button type="submit" name="status" value="APPROVE" class="btn btn-primary float-sm-right" style="margin-left: 10px">
                                    Approve
                                </button>
                                <button type="submit" name="status" value="DISPUTE" class="btn btn-primary float-sm-right">
                                    Dispute
                                </button>
                                @endif
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

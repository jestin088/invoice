@extends('layouts.template')
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
                            <h3 class="card-title">Delivery Inbound</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ isset($deliveryInbound->id) ? route(BladeAcl::getRoute('delivery_inbounds.update'), $deliveryInbound->id) : route(BladeAcl::getRoute('delivery_inbounds.create')) }}">
                            @csrf
                            @if(isset($deliveryInbound->id)) @method('PUT') @endif
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Warehouse</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="warehouse-request-lists" name="warehouse_id">
                                            <option value="" selected>-- Choose Warehouse Request --</option>
                                            @foreach($warehouse_request_lists as $warehouse_request)
                                            <option value="{{ $warehouse_request->id }}" >
                                                {{ $warehouse_request->id.' - '.$warehouse_request->warehouse->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="warehouse-request-container" class="form-group row">
                                    @include('delivery_inbound._warehouse_request_lists')
                                </div>
                                <div class="form-group row">
                                    <label for="inputCustomerNotes" class="col-sm-2 col-form-label">Customer Notes</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCustomerNotes" name="customer_notes" value="{{ (isset($deliveryInbound)) ? $deliveryInbound->customer_notes : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEta" class="col-sm-2 col-form-label">ETA</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="inputEta" name="eta" value="{{ (isset($deliveryInbound)) ? $deliveryInbound->eta : '' }}">
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

    <script>
    window.onload = function(){
        $('#warehouse-request-lists').change(function() {
            var id = $('#warehouse-request-lists').val();
            var ajaxurl = "{{url('/customer/warehouse_request_info/:id')}}";
            ajaxurl = ajaxurl.replace(':id', id);
            $.ajax({
                url: ajaxurl,
                type: "POST",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                success: function(data){
                    $data = $(data); // the HTML content that controller has produced
                    $('#warehouse-request-container').hide().html($data).fadeIn();
                }
            });
        });
    }
    </script>  
    <!-- /.content -->
@endsection

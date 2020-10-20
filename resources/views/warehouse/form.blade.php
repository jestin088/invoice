@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Warehouses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('owner.warehouses.list') }}">Warehouse</a></li>
                        <li class="breadcrumb-item active">{{ $warehouse->id ? 'Edit' : 'Create' }}</li>
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
                            <h3 class="card-title">Warehouse {{ $warehouse->name }} Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="{{ $warehouse->id ? route('owner.warehouses.update', $warehouse->id) : route('owner.warehouses.create') }}" enctype="multipart/form-data">
                            @csrf
                            @if($warehouse->id) @method('PUT') @endif
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{ $warehouse->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContactPerson" class="col-sm-2 col-form-label">Contact Person</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputContactPerson" name="contact_person" value="{{ $warehouse->contact_person }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContactNumber" class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputContactNumber" name="contact_number" value="{{ $warehouse->contact_number }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCountry" name="country" value="{{ $warehouse->country }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputProvince" class="col-sm-2 col-form-label">Province</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputProvince" name="province" value="{{ $warehouse->province }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputCity" name="city" value="{{ $warehouse->city }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $warehouse->address }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPostcode" class="col-sm-2 col-form-label">Postcode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPostcode" name="postcode" value="{{ $warehouse->postcode }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMeasurementUnit" class="col-sm-2 col-form-label">Measurement Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputMeasurementUnit" name="measurement_unit" value="{{ $warehouse->measurement_unit }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputLength" class="col-sm-2 col-form-label">Length</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputLength" name="length" value="{{ $warehouse->length }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputWidth" class="col-sm-2 col-form-label">Width</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputWidth" name="width" value="{{ $warehouse->width }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputHeight" class="col-sm-2 col-form-label">Height</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputHeight" name="height" value="{{ $warehouse->height }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputArea" class="col-sm-2 col-form-label">Area</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputArea" name="area" value="{{ $warehouse->area }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputVolume" class="col-sm-2 col-form-label">Volume</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputVolume" name="volume" value="{{ $warehouse->volume }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCouriers" class="col-sm-12 col-form-label">Couriers</label>
                                    <div id="inputCouriers" class="col-sm-12">
                                        @foreach($couriers as $courier)
                                            <div class="form-check form-check-inline mt-2">
                                                <input class="form-check-input" type="checkbox" id="courier{{ $loop->iteration }}" name="couriers[]" value="{{ $courier->id }}" {{ ( (isset($warehouse_couriers[$courier->id]) && $warehouse_couriers[$courier->id]===true) ? "checked" : "" ) }} >
                                                <label class="form-check-label" for="courier{{ $loop->iteration }}">
                                                    <img src='data:image/jpeg;base64, {{ $courier->avatar }}' alt="Courier{{ $loop->iteration }}" class="img-responsive col-md-3 h-100 d-inline-block" />
                                                    <!-- {{ $courier->name }} -->
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="files" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="files" name="warehouse_image[]" multiple>
                                        <p class="mt-2" id='file_preview'></p>
                                        @if(isset($warehouse_images) && !empty($warehouse_images))
                                            <p id="old-file-preview" class="mt-1">
                                                @foreach($warehouse_images AS $warehouse_image)
                                                    <img width="200" src='data:image/jpeg;base64, <?=$warehouse_image?>'/>
                                                @endforeach
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="services" class="col-sm-2 col-form-label">Services</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="services[]" id="services" multiple>
                                        @if(isset($services) && !empty($services))
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" @if(in_array($service->id, $warehouse_services)) selected @endif > 
                                                    {{ $service->name }} 
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
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
            @if(isset($warehouse->id) && !empty($warehouse->id))
                <div class="row">
                    <section class="col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Shipping Time</h3>
                                @roleCheck(RoleConstant::OWNER)
                                <div class="col-sm-12">
                                    <a href="{{ route('owner.warehouses.shipment_form', $warehouse->id) }}" class="btn btn-primary btn-sm float-sm-right">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                </div><!-- /.col -->
                                @endRoleCheck
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Shipment Day</th>
                                        <th>Time Start</th>
                                        <th>Time End</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach($warehouse_shipment_times as $warehouse_shipment_time)
                                    <tr>
                                        <td>{{ $warehouse_shipment_time->shipment_day }}</td>
                                        <td>{{ $warehouse_shipment_time->shipment_time_start }}</td>
                                        <td>{{ $warehouse_shipment_time->shipment_time_end }}</td>
                                        <td>
                                            <form action="{{ route('owner.warehouses.delete_shipment_time', $warehouse->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="shipment_time_id[]" value="{{ $warehouse_shipment_time->id }}">
                                                <button type="submit" class="btn btn-danger float-sm-middle">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        window.onload = function(){
            $("#old-file-preview").removeClass('d-none');
            //Check File API support
            if(window.File && window.FileList && window.FileReader)
            {
                var filesInput = document.getElementById("files");
                
                filesInput.addEventListener("change", function(event){
                    $("#old-file-preview").addClass('d-none');
                    var files = event.target.files; //FileList object
                    var output = document.getElementById("file_preview");
                    $("#file_preview").html("");
                    
                    for(var i = 0; i< files.length; i++)
                    {
                        var file = files[i];
                        
                        //Only pics
                        if(!file.type.match('image'))
                        continue;
                        
                        var picReader = new FileReader();
                        
                        picReader.addEventListener("load",function(event){
                            
                            var picFile = event.target;
                            
                            var div = document.createElement("span");
                            
                            div.innerHTML = "<img class='col-md-3' src='" + picFile.result + "'" +
                                    "title='" + picFile.name + "'/>";
                            
                            output.insertBefore(div,null);            
                        
                        });
                        
                        //Read the image
                        picReader.readAsDataURL(file);
                    }                               
                
                });
            }
            else
            {
                console.log("Your browser does not support File API");
            }
        }
    </script>
@endsection

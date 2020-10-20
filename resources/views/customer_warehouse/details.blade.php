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
                        <li class="breadcrumb-item"><a href="{{ route(BladeAcl::getRoute('customer_warehouses.list')) }}">Warehouse</a></li>
                        <li class="breadcrumb-item active">Details</li>
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
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 p-3" >

                                <div class="row">
                                    <div class="col-xs-12 col-lg-12 p-2"><img src="https://via.placeholder.com/150" style="max-width: none; height: 80px; border-radius: 38px;" alt="" class="img-responsive"></div>
                                    <div class="col-xs-12 col-lg-12 p-2" style="margin-top: 10px; font-size: 16px">
                                        <div class="row">
                                            <div class="col-xs-6 col-lg-6"><h5>{{ $warehouse->name }}</h5></div>
                                            @if(isset($warehouse->is_verified) && !empty($warehouse->is_verified))
                                            <div class="col-xs-6 col-lg-6 text-right"><span class="badge badge-success">verified</span></div>
                                            @else
                                            <div class="col-xs-6 col-lg-6 text-right"><span class="badge badge-secondary">not verified</span></div>
                                            @endif
                                            <div class="col-xs-12 col-lg-12 "><strong>{{$warehouse->contact_number}}</strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: center; margin-top: 10px;">
                                        <!-- //chat -->
                                        <a class="btn btn-outline-primary col-md-12 " href="https://api.whatsapp.com/send?phone=6285717819190&text=Halo" target="_BLANK"><i class="fa fa-comments"></i> Chat</a>
                                    </div>
                                    <div class="col-md-12" style="text-align: center; margin-top: 10px;">
                                        <!-- //request warehouse use -->
                                        <a class="btn btn-primary col-md-12" href="{{ route(BladeAcl::getRoute('customer_warehouses.request'), $warehouse->id) }}"><i class="icon-comments-alt"></i>Request Penggunaan Gudang</a>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px">
                                        <!-- //delivery rate -->
                                        <strong>Pengiriman dilakukan</strong><br/>
                                        xxx kali sekali
                                    </div>
                                    <div class="col-md-12 " style="margin-top: 10px">
                                        <!-- //Hari pengiriman -->
                                        <table>
                                            <tr>
                                                <td colspan="2"><strong>Hari Pengiriman</strong></td>
                                            </tr>

                                            <tr>
                                                <td><small>Senin</small></td>
                                                <td><small>09:00 - 15:00</small></td>
                                            </tr>
                                            <tr>
                                                <td><small>Selasa</small></td>
                                                <td><small>09:00 - 15:00</small></td>
                                            </tr>
                                            <tr>
                                                <td><small>Rabu</small></td>
                                                <td><small>09:00 - 15:00</small></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px">
                                        <strong>Opsi Pengiriman</strong><br/>
                                        <div class="row">
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>
                                            <img src="https://via.placeholder.com/368x200?text=Kurir" class="img-responsive col-md-3" style="margin-top: 10px; height: 40px"/>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="col-lg-8 p-3" >
                                <div class="row">
                                    <div class="col-md-12">
                                        Profil Gudang
                                    </div>
                                    <div class="col-md-12"  style="margin-top: 10px">
                                        <div class="row">
                                            <div class="col-lg-3 col-xs-3">
                                                <div class="info-box">
                                                    <span class="info-box-icon "><i class="fa fa-exchange-alt"></i></span>
                                                    <div class="info-box-content">
                                                      <span class="info-box-text">Transaction</span>
                                                      <span class="info-box-number">410</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-3">
                                                <div class="info-box">
                                                    <span class="info-box-icon "><i class="fa fa-cubes"></i></span>
                                                    <div class="info-box-content">
                                                      <span class="info-box-text">Jenis Barang</span>
                                                      <span class="info-box-number">410</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xs-3">
                                                <div class="info-box bg-aqua">
                                                    <span class="info-box-icon"><i class="fa fa-chart-line"></i></span>

                                                    <div class="info-box-content">
                                                      <span class="info-box-text">Kinerja</span>
                                                      <span class="info-box-number">4/5</span>

                                                      <div class="progress">
                                                      <div class="progress-bar" style="width: {{4/5*100}}%; background-color:#18f518" ></div>
                                                      </div>

                                                    </div>
                                                    <!-- /.info-box-content -->
                                                  </div>

                                            </div>
                                            <div class="col-lg-3 col-xs-3">
                                                <div class="info-box bg-aqua">
                                                    <span class="info-box-icon"><i class="fa fa-balance-scale"></i></span>

                                                    <div class="info-box-content">
                                                      <span class="info-box-text">Kejujuran</span>
                                                      <span class="info-box-number">5/5</span>

                                                      <div class="progress">
                                                      <div class="progress-bar" style="width: {{5/5*100}}%; background-color:#vf5e418"></div>
                                                      </div>
                                                          {{-- <span class="progress-description">
                                                            70% Increase in 30 Days
                                                          </span> --}}
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                  </div>

                                            </div>

                                        </div>
                                        <div class="col-md-12"  style="margin-top: 10px">
                                            <div class="row">
                                                <div class="col-lg-4 col-xs-4">
                                                    <strong>Catatan Gudang</strong>
                                                    <p><small>
                                                        {{ $warehouse->remarks }}
                                                    </small></p>
                                                </div>
                                                <div class="col-lg-4 col-xs-4">
                                                    <strong>Jasa Lain nya </strong>
                                                    <p>
                                                        <small>
                                                            Fullfilment. Sortir. Testing Barang. Selling. Cold Storage Frozen Food Resi Di Berikan Di Hari Yang Sama
                                                        </small>
                                                    </p>
                                                </div>
                                                <div class="col-lg-4 col-xs-4">
                                                    <strong>Lokasi Gudang</strong>
                                                    <p><small>
                                                        {{ $warehouse->address }}, {{ $warehouse->city }}, {{ $warehouse->province }}, {{ $warehouse->country }}, {{ $warehouse->postcode }}
                                                    </small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12"  style="margin-top: 10px">
                                            <div class="row">
                                                <div class="col-lg-12 col-xs-12">
                                                    <strong>Foto</strong>
                                                        <div class="row">
                                                            @if(isset($warehouse_images) && !empty($warehouse_images))
                                                                @foreach($warehouse_images as $warehouse_image)
                                                                    <img src='data:image/jpeg;base64, <?=$warehouse_image?>' alt="Image{{ $loop->iteration }}" class="img-responsive col-md-3" style="margin-top: 10px; height: 100px"/>
                                                                @endforeach
                                                            @else
                                                                <img src="https://via.placeholder.com/368x200?text=Foto+Gudang" class="img-responsive col-md-3" style="margin-top: 10px; height: 100px"/>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

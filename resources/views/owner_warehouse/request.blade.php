@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Request of Use</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
                        <li class="breadcrumb-item active">Request</li>
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
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Country</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Postcode</th>
                            <th>Dimensions (L x W x H)</th>
                            <th>Area</th>
                            <th>Volume</th>
                            <th>Inventories</th>
                            <th>Action</th>
                        </tr>
                        
                        <tr>
                            <td colspan="8">No data available</td>
                           
                        </tr>
                     
                    </table>

                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

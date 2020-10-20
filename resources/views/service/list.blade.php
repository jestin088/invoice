@extends('layouts.template')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Warehouse Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Warehouse Services</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @roleCheck(RoleConstant::ADMIN)
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.services.form', 0) }}" class="btn btn-primary btn-sm float-sm-right">
                        <i class="fa fa-plus"></i> Create
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @endRoleCheck
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
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->remarks }}</td>
                            <td>
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('services.details'), $service->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @roleCheck(RoleConstant::ADMIN)
                                <a class="btn btn-sm btn-default" href="{{ route(BladeAcl::getRoute('services.form'), $service->id) }}">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endRoleCheck
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

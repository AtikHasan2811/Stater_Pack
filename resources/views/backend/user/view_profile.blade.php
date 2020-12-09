@extends('backend.layouts.master');



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    <!-- Left col -->
                    <section class="col-md-4 offset-md-4 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">


                                    Sales List

                                <div class="card-tools">

                                </div>
                            </div><!-- /.card-header -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{(!empty($data->image))?(url('public/uploads/'.$data->image)):url('public/upload/user_image/no_image.png')}}"
                                                     alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center">{{$data->name}}</h3>

                                            <p class="text-muted text-center">{{$data->address}}</p>

                                            <table width="100%" class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td>Mobile Number</td>
                                                    <td>{{$data->mobile}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$data->email}}</td>
                                                </tr>

                                                <tr>
                                                    <td>Gender</td>
                                                    <td>{{$data->gender}}</td>
                                                </tr>
                                                </tbody>
                                            </table>




                                            <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Profile Edit</b></a>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

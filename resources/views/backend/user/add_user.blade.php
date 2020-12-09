@extends('backend.layouts.master');



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">

{{--                                    <i class="fas fa-chart-pie mr-1"></i>--}}
                                    Sales List
                                    <a href="{{route('users.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> View User</a>

                                <div class="card-tools">

                                </div>
                            </div><!-- /.card-header -->


                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('users.store')}}" method="POST" id="myFrom">
                                        @csrf


                                        <div class="form-row">
                                            <div class="from-group col-md-4">
                                                <label for="">User Role</label>
                                                <select name="user_type" id="user_type" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                                </select>
                                            </div>


                                            <div class="from-group col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control">
                                                <font style="color: red;">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control">
                                                <font style="color: red;">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="password2" class="form-control">
                                            </div>

                                            <div class="from-group col-md-6">
                                                <input type="submit" name="password2" value="Submit" class="btn btn-primary mt-2">
                                            </div>

                                        </div>




                                    </form>

                                </div>
                                <!-- /.card-body -->

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

    <!-- jquery-validation -->
    <script src="{{asset('/')}}public/backend/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('/')}}public/backend/plugins/jquery-validation/additional-methods.min.js"></script>

    <script type="text/javascript" >
        $(document).ready(function () {


        $(function () {
            $('#myFrom').validate({
                rules: {

                    user_type: {
                        required: true,
                        user_type: true,
                    },

                    name: {
                        required: true,
                        name: true,
                    },

                    email: {
                        required: true,
                        email: true,
                    },


                    password: {
                        required: true,
                        minlength: 6
                    },
                    password2: {
                        required: true,
                        equalTo:'#password'
                    },

                    terms: {
                        required: true
                    },
                },
                messages: {
                    user_type: {
                        required: "Please selected a user type",
                        user_type : "Please selected a user type",
                    },
                    name: {
                        required: "Please enter a name ",
                        email: "Please enter a Name"
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },

                    password2: {
                        required: "Please provide a password",
                        equalTo: "confirm password do not match"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        })
    </script>


@endsection

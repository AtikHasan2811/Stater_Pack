@extends('backend.layouts.master');



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Password Change</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Change / Password</li>
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
                                    Password Information
                                    <a href="{{route('profiles.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> Profile View</a>

                                <div class="card-tools">

                                </div>
                            </div><!-- /.card-header -->


                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('profiles.change.password.update')}}" method="POST" id="myFrom">
                                        @csrf

                                        <div class="form-row">





                                            <div class="from-group col-md-4">
                                                <label for="">Current Password</label>
                                                <input type="password" name="current_password" id="password" class="form-control">
                                                <font style="color: red;">{{($errors->has('current_password'))?($errors->first('current_password')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">New Password</label>
                                                <input type="password" name="new_password" id="password" class="form-control">
                                                <font style="color: red;">{{($errors->has('new_password'))?($errors->first('new_password')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="again_new_password" class="form-control">
                                                <font style="color: red;">{{($errors->has('again_new_password'))?($errors->first('again_new_password')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-6">
                                                <input type="submit"  value="Update" class="btn btn-primary mt-2">
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

                    current_password: {
                        required: true,
                        minlength: 6
                    },
                    new_password: {
                        required: true,
                        minlength: 6
                    },

                    again_new_password: {
                        required: true,
                        minlength: 6
                    },
                },
                messages: {
                    current_password: {
                        required: "Please this fill is Required",
                        minlength : "Please Enter 6 Carecter",
                    },
                    new_password: {
                        required: "Please this fill is Required",
                        minlength : "Please Enter 6 Carecter",
                    },
                    again_new_password: {
                        required: "Please this fill is required",
                        minlength : "Please Enter 6 Carecter",
                    },
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
        });
    </script>


@endsection

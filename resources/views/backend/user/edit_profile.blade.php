@extends('backend.layouts.master');



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Progile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
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
                                    Edit Profile
                                    <a href="{{route('profiles.view')}}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> Your Profile</a>

                                <div class="card-tools">

                                </div>
                            </div><!-- /.card-header -->


                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{route('profiles.update')}}" method="POST" enctype="multipart/form-data" id="myFrom">
                                        @csrf
                                        <div class="form-row">

                                            <div class="from-group col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                                <font style="color: red;">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{$data->email}}">
                                                <font style="color: red;">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Mobile</label>
                                                <input type="text" name="mobile" class="form-control" value="{{$data->mobile}}">
                                                <font style="color: red;">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" value="{{$data->address}}">
                                                <font style="color: red;">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                                            </div>


                                            <div class="from-group col-md-4">
                                                <label for="">Gender</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male" {{($data->gender=="Male")?("selected"):''}}>Male</option>
                                                    <option value="Female" {{($data->gender=="Female")?("selected"):''}}>Female</option>
                                                </select>
                                            </div>

                                            <div class="from-group col-md-4">
                                                <label for="">Image</label>
                                                <input type="file" name="image" id="image" class="form-control" value="{{$data->address}}">
                                                <font style="color: red;">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                                            </div>

                                            <div class="from-group col-md-2">
                                                <label for="">Image</label>
                                                <img id="showImage" class="mt-2" src="{{(!empty($data->image))?url('public/uploads/'.$data->image):url('public/upload/user_image/no_image.png')}}" alt="" style="width:150px; height: 160px; border: 1px solid black;">
                                            </div>



                                            <div class="from-group col-md-6 mt-5">
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

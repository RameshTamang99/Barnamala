@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Content Header (Page header) -->
            <div class="content-header">


                <!-- Main content -->
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Manage Profile</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>User Name<span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="name"
                                                                            value="{{ $respDataUser->name }}"
                                                                            class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>User Email<span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="email" name="email"
                                                                            value="{{ $respDataUser->email }}"
                                                                            class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h5>User Mobile<span
                                                                                    class="text-danger">*</span></h5>
                                                                            <div class="controls">
                                                                                <input type="text" name="mobile"
                                                                                    value="{{ $respDataUser->mobile }}"
                                                                                    class="form-control" required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h5>User Address<span
                                                                                    class="text-danger">*</span></h5>
                                                                            <div class="controls">
                                                                                <input type="text" name="address"
                                                                                    value="{{ $respDataUser->address }}"
                                                                                    class="form-control" required="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h5>User Gender <span
                                                                                    class="text-danger">*</span></h5>
                                                                            <div class="controls">
                                                                                <select name="gender" id="gender" required
                                                                                    class="form-control">
                                                                                    <option value="" selected=""
                                                                                        disabled="">Select Gender</option>
                                                                                    <option value="Male"
                                                                                        {{ $respDataUser->gender == 'Male' ? 'selected' : '' }}>
                                                                                        Male</option>
                                                                                    <option value="Female"
                                                                                        {{ $respDataUser->gender == 'Female' ? 'selected' : '' }}>
                                                                                        Female</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <h5>Profile Image<span
                                                                                    class="text-danger">*</span></h5>
                                                                            <div class="controls">
                                                                                <input id="image" type="file" name="image"
                                                                                    class="form-control" required="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="controls">
                                                                                <img style="width:100px; height:100px; border:1px solid #000"
                                                                                    id="showImage"
                                                                                    src="{{ !empty($user->image) ? url('public/upload/user_images/' . $user->image) : url('public/upload/Logo.png') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="text-xs-right">
                                                                    <input type="submit"
                                                                        class="btn btn-rounded btn-info mb-5"
                                                                        value="Update">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
@endsection

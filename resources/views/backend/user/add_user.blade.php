@extends('admin.admin_master')
@section('admin')

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
                            <h4 class="box-title">Add User</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('user.store',"Admin") }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('role')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>User Roles <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="role" id="role" required class="form-control">
                                                                    <option value="" selected="" disabled="">Select Role
                                                                    </option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Teacher">Teacher</option>
                                                                    <option value="Student">Student</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>User Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('email')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>User Email<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('password')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Password<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="password" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                        value="submit">
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

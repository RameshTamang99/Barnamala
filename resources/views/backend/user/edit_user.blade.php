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
                            <h4 class="box-title">Update User</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('user.update', $respData->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>User Roles <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="role" required class="form-control">
                                                                    <option value="" selected="" disabled="">Select Role
                                                                    </option>
                                                                    <option value="Admin"
                                                                        {{ $respData->role == 'Admin' ? 'selected' : '' }}>
                                                                        Admin</option>
                                                                    <option value="Teacher"
                                                                        {{ $respData->role == 'Teacher' ? 'selected' : '' }}>
                                                                        Teacher</option>
                                                                    <option value="Student"
                                                                        {{ $respData->role == 'Student' ? 'selected' : '' }}>
                                                                        Student</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>User Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $respData->name }}" require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <h5>User Email<span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="email" name="email"
                                                                            value="{{ $respData->email }}"
                                                                            class="form-control" require="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">

                                                            </div>
                                                        </div>
                                                        <div class="text-xs-right">
                                                            <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                                value="Update">
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

@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Content Header (Page header) -->
            <div class="content-header">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Main content -->
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Sankhya</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('sankhya.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('sankhya_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Sankhya Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="sankhya_name" class="form-control"
                                                                    require="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('sankhya_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Sankhya Audio</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="sankhya_audio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="submit">
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

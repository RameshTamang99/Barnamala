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
                            <h4 class="box-title">Add KMK</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('kmk.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('byanjan_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Byanjan Names<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="custom-select" name="byanjan_id">
                                                            <option selected>Select Byanjans </option>
                                                            @foreach($allData as $key => $byanjan)
                                                                <option value="{{ $byanjan->id }}">{{ $byanjan->byanjan_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('kmk_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Kmk Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="kmk_name" class="form-control"
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
                                                        @error('kmk_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Kmk Image</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="kmk_image">
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
                                                        @error('kmk_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Kmk Audio</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="kmk_audio">
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

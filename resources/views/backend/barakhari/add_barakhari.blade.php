@extends('admin.admin_master')
@section('admin')


    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <div class="content-header">
                <!-- Main content -->
                <section class="content">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add Barakhari</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('barakhari.store') }}" enctype="multipart/form-data">
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
                                                            @error('barakhari_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Barakhari Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="barakhari_name" class="form-control"
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
                                                        @error('barakhari_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Barakhari Audio</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="barakhari_audio">
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

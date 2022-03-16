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
                            <h4 class="box-title">Update Swor</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('swor.update', $respData->id) }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('swor_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Swor Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="swor_name" class="form-control"
                                                                    require="" value="{{$respData->swor_name}}">
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
                                                        @error('swor_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Swor Audio</h5>
                                                            <audio controls>
                                                                <source src="{{asset('public/uploads/swor_audio/'.$respData->swor_audio)}}" type="audio/mpeg">
                                                            </audio>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="swor_audio">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-info mb-5"
                                                        value="Update">
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

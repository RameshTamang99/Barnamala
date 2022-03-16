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
                            <h4 class="box-title">Update No Wifi UI</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('noWifiUi.update', $respData->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('model_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Model Image</h5>
                                                            @if($respData->model_image == NULL)
                                                                {{$error}}
                                                            @else
                                                                <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                                src="{{ (!empty($respData->model_image)) ? url('public/uploads/no_wifi_ui_image/'.$respData->model_image) : url('public/uploads/no_wifi_ui_image/'.$respData->model_image) }}">
                                                            @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="model_image" id="image">
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
                                                        @error('reconnect_btn_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Reconnect Button Image</h5>
                                                            @if($respData->reconnect_btn_image == NULL)
                                                                {{$error}}
                                                            @else
                                                                <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                                src="{{ (!empty($respData->reconnect_btn_image)) ? url('public/uploads/no_wifi_ui_image/'.$respData->reconnect_btn_image) : url('public/uploads/no_wifi_ui_image/'.$respData->reconnect_btn_image) }}">
                                                            @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="reconnect_btn_image" id="image1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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

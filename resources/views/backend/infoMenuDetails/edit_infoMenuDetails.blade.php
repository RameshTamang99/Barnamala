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
                            <h4 class="box-title">Update Info Menu Details</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('infoMenuDetails.update', $respEditData->id) }}"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('menu_id')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <div class="controls">
                                                        <input type="hidden" name="menu_id" value="{{$respMenuId}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('imd_name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="imd_name" class="form-control"
                                                                    require="" value="{{$respEditData->imd_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('imd_description')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Description<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <textarea name="imd_description"  cols="30" rows="10"  class="form-control" required="" >{{$respEditData->imd_description}}</textarea>
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
                                                        @error('imd_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Image</h5>
                                                        @if($respEditData->imd_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                            src="{{ (!empty($respEditData->imd_image)) ? url('public/uploads/imd_image/'.$respEditData->imd_image) : url('public/uploads/imd_image/'.$respEditData->imd_image) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="imd_image" id="image">
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
                                                        @error('imd_background_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                    <h5>Background Image</h5>
                                                    @if($respEditData->imd_background_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                            src="{{ (!empty($respEditData->imd_background_image)) ? url('public/uploads/imd_background_image/'.$respEditData->imd_background_image) : url('public/uploads/imd_background_image/'.$respData->imd_background_image) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="imd_background_image" id="image1">
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
                                                        @error('imd_audio')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Audio</h5>
                                                        <audio controls>
                                                            <source src="{{asset('public/uploads/imd_audio/'.$respEditData->imd_audio)}}"
                                                                type="audio/mpeg">
                                                        </audio>
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="imd_audio">
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
                                                        @error('imd_video')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Video</h5>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="imd_video">
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

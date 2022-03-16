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
                            <h4 class="box-title">Update Literature Category </h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('literatureCategory.update', $respData->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('name')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Name<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control" required="" value="{{$respData->name}}">
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
                                                            @error('status')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>status<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="number" name="status" class="form-control"
                                                                    required="" value="{{$respData->status }}">
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
                                                        @error('icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Icon Image</h5>
                                                        @if($respData->icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                            src="{{ (!empty($respData->icon_image)) ? url('public/uploads/literature_category_icon_image/'.$respData->icon_image) : url('public/uploads/literature_category_icon_image/'.$respData->icon_image) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="icon_image" id="image">
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
                                                        @error('bg_image_details')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Background Image Details</h5>
                                                        @if($respData->bg_image_details == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                            src="{{ (!empty($respData->bg_image_details)) ? url('public/uploads/literature_category_bg_image_details/'.$respData->bg_image_details) : url('public/uploads/literature_category_bg_image_details/'.$respData->bg_image_details) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="bg_image_details" id="image1">
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
                                                        @error('back_button_details')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Back Button Details Image </h5>
                                                        @if($respData->back_button_details == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                            src="{{ (!empty($respData->back_button_details)) ? url('public/uploads/literature_category_back_button_details/'.$respData->back_button_details) : url('public/uploads/literature_category_back_button_details/'.$respData->back_button_details) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="back_button_details" id="image2">
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
                                                        @error('card_button_details')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Card Button Details Image</h5>
                                                        @if($respData->card_button_details == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                            src="{{ (!empty($respData->card_button_details)) ? url('public/uploads/literature_category_card_button_details/'.$respData->card_button_details) : url('public/uploads/literature_category_card_button_details/'.$respData->card_button_details) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="card_button_details" id="image3">
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

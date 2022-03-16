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
                            <h4 class="box-title">Update Informative Menu</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('infoMenu.update', $respData->id) }}" enctype="multipart/form-data">
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
                                                            @error('description')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Description<span class="text-danger">*</span></h5>
                                                            <textarea name="description" cols="50" rows="10" required="">{{$respData->description}}</textarea>
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
                                                        @error('background')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Background Image</h5>
                                                        @if($respData->background == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                            src="{{ (!empty($respData->background)) ? url('public/uploads/background/'.$respData->background) : url('public/uploads/background/'.$respData->background) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="background" id="image">
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
                                                        @error('back_icon')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Back Icon Image</h5>
                                                        @if($respData->back_icon == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                            src="{{ (!empty($respData->back_icon)) ? url('public/uploads/back_icon/'.$respData->back_icon) : url('public/uploads/back_icon/'.$respData->back_icon) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="back_icon" id="image1">
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
                                                        @error('card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Card Image</h5>
                                                        @if($respData->card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                            src="{{ (!empty($respData->card_image)) ? url('public/uploads/card_image/'.$respData->card_image) : url('public/uploads/card_image/'.$respData->card_image) }}" height="70px" width="70px">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="card_image" id="image2">
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

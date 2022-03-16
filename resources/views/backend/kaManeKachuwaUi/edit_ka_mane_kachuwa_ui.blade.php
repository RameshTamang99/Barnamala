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
                            <h4 class="box-title">Update Ka Mane Kachuwa UI</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('kaManeKachuwaUi.update', $respData->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('background_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Background Image</h5>
                                                        @if($respData->background_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                             src="{{ (!empty($respData->background_image)) ? url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->background_image) : url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->background_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="background_image" id="image">
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
                                                        @error('back_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Back Button Image</h5>
                                                        @if($respData->back_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                             src="{{ (!empty($respData->back_button_image)) ? url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->back_button_image) : url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->back_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="back_button_image" id="image1">
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
                                                        @error('text_display_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Text Display Card Image</h5>
                                                        @if($respData->text_display_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                             src="{{ (!empty($respData->text_display_card_image)) ? url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->text_display_card_image) : url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->text_display_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="text_display_card_image" id="image2">
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
                                                        @error('autoplay_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Autoplay Image Image</h5>
                                                        @if($respData->autoplay_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                             src="{{ (!empty($respData->autoplay_image)) ? url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->autoplay_image) : url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->autoplay_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="autoplay_image" id="image3">
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
                                                        @error('autoplay_pause_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Autopause Image Image</h5>
                                                        @if($respData->autoplay_pause_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage4"
                                                            src="{{ (!empty($respData->autoplay_pause_image)) ? url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->autoplay_pause_image) : url('public/uploads/ka_mane_kachuwa_ui_image/'.$respData->autoplay_pause_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="autoplay_pause_image" id="image4">
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

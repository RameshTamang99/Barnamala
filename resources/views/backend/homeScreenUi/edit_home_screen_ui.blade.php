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
                            <h4 class="box-title">Update Home Screen UI</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('homeScreenUi.update', $respData->id) }}"
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
                                                             src="{{ (!empty($respData->background_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->background_image) : url('public/uploads/home_screen_ui_image/'.$respData->background_image) }}">
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
                                                        @error('quiz_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Quiz Icon Image</h5>
                                                        @if($respData->quiz_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                             src="{{ (!empty($respData->quiz_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->quiz_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->quiz_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="quiz_icon_image" id="image1">
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
                                                        @error('literature_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Literature Icon Image</h5>
                                                        @if($respData->literature_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                             src="{{ (!empty($respData->literature_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->literature_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->literature_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="literature_icon_image" id="image2">
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
                                                        @error('barnamaala_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Barnamaala Icon Image</h5>
                                                        @if($respData->barnamaala_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                             src="{{ (!empty($respData->barnamaala_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->barnamaala_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->barnamaala_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="barnamaala_icon_image" id="image3">
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
                                                        @error('informatives_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Informatives Icon Image</h5>
                                                        @if($respData->informatives_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage4"
                                                             src="{{ (!empty($respData->informatives_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->informatives_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->informatives_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="informatives_icon_image" id="image4">
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
                                                        @error('profile_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Profile Icon Image</h5>
                                                        @if($respData->profile_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage5"
                                                             src="{{ (!empty($respData->profile_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->profile_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->profile_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="profile_icon_image" id="image5">
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
                                                        @error('sound_on_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Sound On Icon Image</h5>
                                                        @if($respData->sound_on_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage6"
                                                             src="{{ (!empty($respData->sound_on_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->sound_on_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->sound_on_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="sound_on_icon_image" id="image6">
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
                                                        @error('sound_off_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Sound Off Icon Image</h5>
                                                        @if($respData->sound_off_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage7"
                                                             src="{{ (!empty($respData->sound_off_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->sound_off_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->sound_off_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="sound_off_icon_image" id="image7">
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
                                                        @error('close_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Close Icon Image</h5>
                                                        @if($respData->close_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage8"
                                                             src="{{ (!empty($respData->close_icon_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->close_icon_image) : url('public/uploads/home_screen_ui_image/'.$respData->close_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="close_icon_image" id="image8">
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
                                                        @error('close_model_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Close Model Image</h5>
                                                        @if($respData->close_model_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage9"
                                                             src="{{ (!empty($respData->close_model_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->close_model_image) : url('public/uploads/home_screen_ui_image/'.$respData->close_model_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="close_model_image" id="image9">
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
                                                        @error('close_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Close Button Image</h5>
                                                        @if($respData->close_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage10"
                                                             src="{{ (!empty($respData->close_button_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->close_button_image) : url('public/uploads/home_screen_ui_image/'.$respData->close_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="close_button_image" id="image10">
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
                                                        @error('dont_close_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Don't Close Button Image</h5>
                                                        @if($respData->dont_close_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage11"
                                                             src="{{ (!empty($respData->dont_close_button_image)) ? url('public/uploads/home_screen_ui_image/'.$respData->dont_close_button_image) : url('public/uploads/home_screen_ui_image/'.$respData->dont_close_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="dont_close_button_image" id="image11">
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

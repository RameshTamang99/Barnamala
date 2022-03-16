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
                            <h4 class="box-title">Update Barnamaala Contents Menu UI</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('barnamaalaContentsMenuUi.update', $respData->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @error('list_bg_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>List Background Image</h5>
                                                        @if($respData->list_bg_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage"
                                                             src="{{ (!empty($respData->list_bg_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_bg_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_bg_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="list_bg_image" id="image">
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
                                                        @error('list_back_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>List Back Button Image</h5>
                                                        @if($respData->list_back_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                             src="{{ (!empty($respData->list_back_button_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_back_button_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_back_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="list_back_button_image" id="image1">
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
                                                        @error('list_letter_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>List Letter Card Image</h5>
                                                        @if($respData->list_letter_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                             src="{{ (!empty($respData->list_letter_card_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_letter_card_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_letter_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="list_letter_card_image" id="image2">
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
                                                        @error('list_header_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>List Header Image</h5>
                                                        @if($respData->list_header_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                             src="{{ (!empty($respData->list_header_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_header_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->list_header_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="list_header_image" id="image3">
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
                                                        @error('particular_text_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Text Card Image</h5>
                                                        @if($respData->particular_text_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage4"
                                                             src="{{ (!empty($respData->particular_text_card_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_text_card_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_text_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_text_card_image" id="image4">
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
                                                        @error('particular_teacher_avatar_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Teacher Avatar Image</h5>
                                                        @if($respData->particular_teacher_avatar_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage5"
                                                             src="{{ (!empty($respData->particular_teacher_avatar_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_teacher_avatar_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_teacher_avatar_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_teacher_avatar_image" id="image5">
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
                                                        @error('particular_back_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Back Button Image</h5>
                                                        @if($respData->particular_back_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage6"
                                                             src="{{ (!empty($respData->particular_back_button_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_back_button_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_back_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_back_button_image" id="image6">
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
                                                        @error('particular_background_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Background Image</h5>
                                                        @if($respData->particular_background_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage7"
                                                             src="{{ (!empty($respData->particular_background_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_background_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_background_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_background_image" id="image7">
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
                                                        @error('particular_auto_play_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Auto Play Icon Image</h5>
                                                        @if($respData->particular_auto_play_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage8"
                                                             src="{{ (!empty($respData->particular_auto_play_icon_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_auto_play_icon_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_auto_play_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_auto_play_icon_image" id="image8">
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
                                                        @error('particular_auto_play_pause_icon_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Particular Auto Pause Icon Image</h5>
                                                        @if($respData->particular_auto_play_pause_icon_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage9"
                                                             src="{{ (!empty($respData->particular_auto_play_pause_icon_image)) ? url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_auto_play_pause_icon_image) : url('public/uploads/barnamaala_contents_menu_ui_image/'.$respData->particular_auto_play_pause_icon_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="particular_auto_play_pause_icon_image" id="image9">
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
                                                            @error('type')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                            <h5>Type<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select class="custom-select" name="type">
                                                                    <option selected>{{$respData->type}}</option>
                                                                    <option value="byanjan">Byanjan</option>
                                                                    <option value="barakhari">Barakhari</option>
                                                                    <option value="swor">Swor</option>
                                                                    <option value="sankhya">Sankhya </option>
                                                                </select>
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

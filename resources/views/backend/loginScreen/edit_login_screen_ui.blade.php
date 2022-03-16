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
                            <h4 class="box-title">Update Login Screen Images</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('loginScreen.update', $respData->id) }}"
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
                                                             src="{{ (!empty($respData->background_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->background_image) : url('public/uploads/login_screen_ui_image/'.$respData->background_image) }}">
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
                                                        @error('header_text_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Header Text Image</h5>
                                                        @if($respData->header_text_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                             src="{{ (!empty($respData->header_text_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->header_text_image) : url('public/uploads/login_screen_ui_image/'.$respData->header_text_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="header_text_image" id="image1">
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
                                                        @error('login_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Login Button Image</h5>
                                                        @if($respData->login_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                             src="{{ (!empty($respData->login_button_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->login_button_image) : url('public/uploads/login_screen_ui_image/'.$respData->login_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="login_button_image" id="image2">
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
                                                        @error('fb_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>FB Button Image</h5>
                                                        @if($respData->fb_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                             src="{{ (!empty($respData->fb_button_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->fb_button_image) : url('public/uploads/login_screen_ui_image/'.$respData->fb_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="fb_button_image" id="image3">
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
                                                        @error('google_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Google Button Image</h5>
                                                        @if($respData->google_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage4"
                                                             src="{{ (!empty($respData->google_button_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->google_button_image) : url('public/uploads/login_screen_ui_image/'.$respData->google_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="google_button_image" id="image4">
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
                                                        @error('password_forget_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Password Forget Button Image</h5>
                                                        @if($respData->password_forget_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage5"
                                                             src="{{ (!empty($respData->password_forget_button_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->password_forget_button_image) : url('public/uploads/login_screen_ui_image/'.$respData->password_forget_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="password_forget_button_image" id="image5">
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
                                                        @error('new_account_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>New Account Button Image</h5>
                                                        @if($respData->new_account_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage6"
                                                             src="{{ (!empty($respData->new_account_button_image)) ? url('public/uploads/login_screen_ui_image/'.$respData->new_account_button_image) : url('public/uploads/login_screen_ui_image/'.$respData->new_account_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="new_account_button_image" id="image6">
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

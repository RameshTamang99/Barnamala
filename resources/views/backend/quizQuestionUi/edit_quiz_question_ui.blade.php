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
                            <h4 class="box-title">Update Quiz Question UI</h4>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="{{ route('quizQuestionUi.update', $respData->id) }}"
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
                                                            src="{{ (!empty($respData->background_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->background_image) : url('public/uploads/quiz_question_ui_image/'.$respData->background_image) }}">
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
                                                        @error('header_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Header Image</h5>
                                                        @if($respData->header_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage1"
                                                            src="{{ (!empty($respData->header_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->header_image) : url('public/uploads/quiz_question_ui_image/'.$respData->header_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="header_image" id="image1">
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
                                                        @error('score_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Score Card Image</h5>
                                                        @if($respData->score_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage2"
                                                            src="{{ (!empty($respData->score_card_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->score_card_image) : url('public/uploads/quiz_question_ui_image/'.$respData->score_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="score_card_image" id="image2">
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
                                                        @error('time_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Time Card Image</h5>
                                                        @if($respData->time_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage3"
                                                            src="{{ (!empty($respData->time_card_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->time_card_image) : url('public/uploads/quiz_question_ui_image/'.$respData->time_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="time_card_image" id="image3">
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
                                                        @error('question_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Question Card Image</h5>
                                                        @if($respData->question_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage4"
                                                            src="{{ (!empty($respData->question_card_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->question_card_image) : url('public/uploads/quiz_question_ui_image/'.$respData->question_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="question_card_image" id="image4">
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
                                                        @error('answer_card_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Answer Card Image</h5>
                                                        @if($respData->answer_card_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage5"
                                                             src="{{ (!empty($respData->answer_card_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->answer_card_image) : url('public/uploads/quiz_question_ui_image/'.$respData->answer_card_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="answer_card_image" id="image5">
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
                                                        @error('plus_one_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Plus One Image</h5>
                                                        @if($respData->plus_one_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage6"
                                                             src="{{ (!empty($respData->plus_one_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->plus_one_image) : url('public/uploads/quiz_question_ui_image/'.$respData->plus_one_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="plus_one_image" id="image6">
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
                                                        @error('winner_model_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Winner Model Image</h5>
                                                        @if($respData->winner_model_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage7"
                                                             src="{{ (!empty($respData->winner_model_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->winner_model_image) : url('public/uploads/quiz_question_ui_image/'.$respData->winner_model_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="winner_model_image" id="image7">
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
                                                        @error('lost_model_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Lost Model Image</h5>
                                                        @if($respData->lost_model_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage8"
                                                             src="{{ (!empty($respData->lost_model_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->lost_model_image) : url('public/uploads/quiz_question_ui_image/'.$respData->lost_model_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="lost_model_image" id="image8">
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
                                                        @error('play_again_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Play Again Button Image</h5>
                                                        @if($respData->play_again_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage9"
                                                             src="{{ (!empty($respData->play_again_button_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->play_again_button_image) : url('public/uploads/quiz_question_ui_image/'.$respData->play_again_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="play_again_button_image" id="image9">
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
                                                        @error('go_to_home_button_image')
                                                            <div class="error">{{ $message }}</div>
                                                        @enderror
                                                        <h5>Go To Home Botton Image</h5>
                                                        @if($respData->go_to_home_button_image == NULL)
                                                            {{$error}}
                                                        @else
                                                            <img style="width:100px; height:100px; border:1px solid #000"  id="showImage10"
                                                            src="{{ (!empty($respData->go_to_home_button_image)) ? url('public/uploads/quiz_question_ui_image/'.$respData->go_to_home_button_image) : url('public/uploads/quiz_question_ui_image/'.$respData->go_to_home_button_image) }}">
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <div class="form-group">
                                                            <div class="panel-content">
                                                                <input type="file" name="go_to_home_button_image" id="image10">
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

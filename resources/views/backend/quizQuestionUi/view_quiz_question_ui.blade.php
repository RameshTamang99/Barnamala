@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Quiz Question UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Header Image</th>
                                <th>Score Card Image</th>
                                <th>Time Card Image</th>
                                <th>Question Card Image</th>
                                <th>Answer Card Image</th>
                                <th>Plus One Image</th>
                                <th>Winner Model Image</th>
                                <th>Lost Model Image</th>
                                <th>Play Again Botton Image</th>
                                <th>Goto Home Botton Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $quizQuestionUiData)
							<tr>
                                <td>{{$quizQuestionUiData->id}}</td>
                                <td>
                                    @if($quizQuestionUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->header_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->header_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->score_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->score_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->time_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->time_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->question_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->question_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->answer_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->answer_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->plus_one_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->plus_one_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->winner_model_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->winner_model_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->lost_model_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->lost_model_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->play_again_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->play_again_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizQuestionUiData->go_to_home_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_question_ui_image/'.$quizQuestionUiData->go_to_home_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('quizQuestionUi.edit',$quizQuestionUiData->id)}}" class="btn btn-info">Edit</a>
                                </td>
							</tr>
						@endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
@endsection

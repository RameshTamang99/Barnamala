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
				  <h3 class="box-title">{{$respCodeName}} | Madhyama Quiz Questions Lists</h3>
                <a href="#" style="float:right;"  class="btn btn-rounded btn-success mb-5"  data-toggle="modal" data-target="#addQuiz">Add Quiz </a>
                <a href="{{route('quizCategory.quiz.trashView',$respQuizCatCode)}}"  style="float:right;" class="btn btn-rounded btn-success mb-5">Quiz Trash</a>
                <a href="{{route('quizCategory.sajiloQuestionsView',$respQuizCatCode)}}"  style="float:right;" class="btn btn-rounded btn-success mb-5">Sajilo Questions</a>
                <a href="{{route('quizCategory.gaaroQuestionsView',$respQuizCatCode)}}"  style="float:right;" class="btn btn-rounded btn-success mb-5">Garo Questions</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th width="20px">#</th>
								<th width="5%">SN</th>
								<th>Question</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>Right Option</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody id="sajiloQuizQuestionsTableContents">
                        @foreach($allData as $key => $quiz)
                            <tr id="{{$quiz->quiz_order}}" >
                                <input type="hidden" class="id_sajiloQuizesQuestions" value="{{$quiz->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$quiz->id}}">{{$key+1}}</td>
								<td>{{$quiz->question}}</td>
                                <td>{{$quiz->option_1}}</td>
                                <td>{{$quiz->option_2}}</td>
                                <td>{{$quiz->option_3}}</td>
                                <td>{{$quiz->option_4}}</td>
                                <td>{{$quiz->right_option}}</td>
                                <td>{{$quiz->quiz_order}}</td>
								<td>
                                    <a href="{{route('questions.edit',$quiz->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('quiz.delete',$quiz->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

  <div class="modal fade" id="addQuiz" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Add Quiz</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('quiz.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="hidden" name="quiz_cat_code" value="{{$respQuizCatCode}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('question_level')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Question Type<span class="text-danger">*</span></h5>
                                                    <select class="custom-select" name="question_level">
                                                        <option selected>Select Question Types </option>
                                                        <option value="sajilo">Sajilo</option>
                                                        <option value="madhyama">Madhyama</option>
                                                        <option value="gaaro">Gaaro</option>
                                                    </select>
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
                                                    @error('question')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Question<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="question" class="form-control"
                                                            require="">
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
                                                    @error('option_1')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Option 1<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="option_1" class="form-control"
                                                            require="">
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
                                                    @error('option_2')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Option 2<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="option_2" class="form-control"
                                                            require="">
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
                                                    @error('option_3')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Option 3<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="option_3" class="form-control"
                                                            require="">
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
                                                    @error('option_4')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Option 4<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="option_4" class="form-control"
                                                            require="">
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
                                                    @error('right_option')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Right Option<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select class="custom-select" name="right_option">
                                                            <option selected>Select Right Options </option>
                                                            <option value="1">Option 1</option>
                                                            <option value="2">Option 2</option>
                                                            <option value="3">Option 3</option>
                                                            <option value="4">Option 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="submit">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
</div>






@endsection

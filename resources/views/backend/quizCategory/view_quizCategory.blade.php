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
				  <h3 class="box-title">Quiz Category  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addQuizCategory" >Add Quiz Category</a>
                <a href="{{route('quizCategory.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Quiz Category Trash</a>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#editQuizSettings" >Update Quiz Settings</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th width="20px">#</th>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Icon</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody id="quizcattablecontents">
                        @foreach($allData as $key => $quiz_cat)
                            <tr id="{{$quiz_cat->quiz_cat_order}}" >
                                <input type="hidden" class="id_quiz_cats" value="{{$quiz_cat->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$quiz_cat->id}}">{{$quiz_cat->id}}</td>
								<td>{{$quiz_cat->quiz_cat_name}}</td>
                                <td>
                                    @if($quiz_cat->quiz_cat_icon == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_cat_icon/'.$quiz_cat->quiz_cat_icon)}}" height="50px"
                                        width="50px" >
                                    @endif
                                </td>
                                <td>{{$quiz_cat->quiz_cat_order}}</td>
								<td>
                                    <a href="{{route('quizCategory.sajiloQuestionsView',$quiz_cat->quiz_cat_code)}}" class="btn btn-success">View</a>
                                    <a href="{{route('quizCategory.edit',$quiz_cat->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('quizCategory.delete',$quiz_cat->id)}}" class="btn btn-danger" id="delete">Delete</a>
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


			  <!-- /.box -->
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <div class="modal fade" id="editQuizSettings" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Update Quiz Settings</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <form method="post" action="{{ route('quizSettings.update',$respData1->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @error('quiz_questions')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Quiz Question<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="number" name="quiz_questions" class="form-control"
                                                        required="" value="{{ $respData1->quiz_questions }}">
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
                                                @error('quiz_time')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Quiz Time<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="number" name="quiz_time" class="form-control"
                                                        required="" value="{{ $respData1->quiz_time }}">
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

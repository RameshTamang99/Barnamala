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
				  <h3 class="box-title">Quiz Lists</h3>
                <a href="{{route('quiz.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Quiz </a>
                <a href="{{route('quiz.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Quiz Trash</a>
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
						<tbody id="quiztablecontents">
                        @foreach($allData as $key => $quiz)
                            <tr id="{{$quiz->quiz_order}}" >
                                <input type="hidden" class="id_quizs" value="{{$quiz->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$quiz->id}}">{{$quiz->id}}</td>
								<td>{{$quiz->question}}</td>
                                <td>{{$quiz->option_1}}</td>
                                <td>{{$quiz->option_2}}</td>
                                <td>{{$quiz->option_3}}</td>
                                <td>{{$quiz->option_4}}</td>
                                <td>{{$quiz->right_option}}</td>
                                <td>{{$quiz->quiz_order}}</td>
								<td>
                                    <a href="{{route('quiz.edit',$quiz->id)}}" class="btn btn-info">Edit</a>
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





@endsection

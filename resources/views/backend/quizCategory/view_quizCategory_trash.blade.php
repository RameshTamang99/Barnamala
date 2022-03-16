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
				  <h3 class="box-title"> Quiz Category Trashed Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addQuizCategory">Add Quiz Category </a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Icon</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $quiz_cat)
							<tr>
								<td>{{$quiz_cat->id}}</td>
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
                                    <a href="{{route('quizCategory.restore',$quiz_cat->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('quizCategory.permanentDelete',$quiz_cat->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

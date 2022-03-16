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
				  <h3 class="box-title">Quiz Level UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Back Button Image</th>
                                <th>Sajilo Level Button Image</th>
                                <th>Madhyama Level Button Image</th>
                                <th>Gaaro Level Button Image</th>
                                <th>Avatar Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $quizLevelUiData)
							<tr>
                                <td>{{$quizLevelUiData->id}}</td>
                                <td>
                                    @if($quizLevelUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizLevelUiData->back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizLevelUiData->sajilo_level_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->sajilo_level_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizLevelUiData->madhyama_level_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->madhyama_level_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizLevelUiData->gaaro_level_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->gaaro_level_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($quizLevelUiData->avatar_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/quiz_level_ui_image/'.$quizLevelUiData->avatar_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('quizLevelUi.edit',$quizLevelUiData->id)}}" class="btn btn-info">Edit</a>
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

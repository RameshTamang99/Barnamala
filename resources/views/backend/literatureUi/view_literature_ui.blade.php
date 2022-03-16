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
				  <h3 class="box-title">Literature UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Back Button Image</th>
                                <th>Category Display Card Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $literatureUiData)
							<tr>
                                <td>{{$literatureUiData->id}}</td>
                                <td>
                                    @if($literatureUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_ui_image/'.$literatureUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($literatureUiData->back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_ui_image/'.$literatureUiData->back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($literatureUiData->category_display_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_ui_image/'.$literatureUiData->category_display_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('literatureUi.edit',$literatureUiData->id)}}" class="btn btn-info">Edit</a>
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

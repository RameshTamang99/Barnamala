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
				  <h3 class="box-title">Home Screen UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Quiz Icon Image</th>
                                <th>Literature Icon Image</th>
                                <th>Barnamaala Icon Image</th>
                                <th>Informatives Icon Image</th>
                                <th>Profile Icon Image</th>
                                <th>Sound On Icon Image</th>
                                <th>Sound Off Icon Image</th>
                                <th>Close Icon Image</th>
                                <th>Close Model Image</th>
                                <th>Close Button Image</th>
                                <th>Don't Close Button Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $homeScreenUiData)
							<tr>
                                <td>{{$homeScreenUiData->id}}</td>
                                <td>
                                    @if($homeScreenUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->quiz_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->quiz_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->literature_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->literature_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->barnamaala_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->barnamaala_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->informatives_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->informatives_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->profile_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->profile_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->sound_on_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->sound_on_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->sound_off_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->sound_off_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->close_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->close_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->close_model_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->close_model_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->close_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->close_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($homeScreenUiData->dont_close_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/home_screen_ui_image/'.$homeScreenUiData->dont_close_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('homeScreenUi.edit',$homeScreenUiData->id)}}" class="btn btn-info">Edit</a>
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

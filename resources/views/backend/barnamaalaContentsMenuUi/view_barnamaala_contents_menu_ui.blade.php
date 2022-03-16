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
				  <h3 class="box-title">Barnamaala Contents Menu UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>List Background Image</th>
                                <th>List Back Button Image</th>
                                <th>List Letter Card Image</th>
                                <th>List Header Image</th>
                                <th>Particular Text Card Image</th>
                                <th>Particular Teacher Avatar Image</th>
                                <th>Particular Back Button Image</th>
                                <th>Particular Background Image</th>
                                <th>Particular Auto Play Icon Image</th>
                                <th>Particular Auto Pause Icon Image</th>
                                <th>Type</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $barnamaalaContentsMenuUiData)
							<tr>
                                <td>{{$barnamaalaContentsMenuUiData->id}}</td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->list_bg_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->list_bg_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->list_back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->list_back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->list_letter_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->list_letter_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->list_header_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->list_header_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_text_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_text_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_teacher_avatar_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_teacher_avatar_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_auto_play_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_auto_play_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaContentsMenuUiData->particular_auto_play_pause_icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_contents_menu_ui_image/'.$barnamaalaContentsMenuUiData->particular_auto_play_pause_icon_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>{{$barnamaalaContentsMenuUiData->type}}</td>
                                <td>
                                    <a href="{{route('barnamaalaContentsMenuUi.edit',$barnamaalaContentsMenuUiData->id)}}" class="btn btn-info">Edit</a>
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

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
				  <h3 class="box-title">Barnamaala Menu UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Back Button Image</th>
                                <th>Byanjan Menu Button Image</th>
                                <th>Ka Mane Kachuwa Menu Button Image</th>
                                <th>Barakhari Menu Button Image</th>
                                <th>Swor Menu Button Image</th>
                                <th>Sankhya Menu Button Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $barnamaalaMenuUiData)
							<tr>
                                <td>{{$barnamaalaMenuUiData->id}}</td>
                                <td>
                                    @if($barnamaalaMenuUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->byanjan_menu_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->byanjan_menu_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->ka_mane_kachuwa_menu_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->ka_mane_kachuwa_menu_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->barakhari_menu_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->barakhari_menu_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->swor_menu_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->swor_menu_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($barnamaalaMenuUiData->sankhya_menu_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/barnamaala_menu_ui_image/'.$barnamaalaMenuUiData->sankhya_menu_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('barnamaalaMenuUi.edit',$barnamaalaMenuUiData->id)}}" class="btn btn-info">Edit</a>
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

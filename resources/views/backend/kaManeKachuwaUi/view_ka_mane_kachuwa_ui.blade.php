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
				  <h3 class="box-title">Ka Mane Kachuwa UI Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Back Button Image</th>
                                <th>Text Display Card Image</th>
                                <th>Autoplay Image</th>
                                <th>Autopause Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $kaManeKachuwaUiData)
							<tr>
                                <td>{{$kaManeKachuwaUiData->id}}</td>
                                <td>
                                    @if($kaManeKachuwaUiData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/ka_mane_kachuwa_ui_image/'.$kaManeKachuwaUiData->background_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($kaManeKachuwaUiData->back_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/ka_mane_kachuwa_ui_image/'.$kaManeKachuwaUiData->back_button_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($kaManeKachuwaUiData->text_display_card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/ka_mane_kachuwa_ui_image/'.$kaManeKachuwaUiData->text_display_card_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($kaManeKachuwaUiData->autoplay_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/ka_mane_kachuwa_ui_image/'.$kaManeKachuwaUiData->autoplay_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($kaManeKachuwaUiData->autoplay_pause_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/ka_mane_kachuwa_ui_image/'.$kaManeKachuwaUiData->autoplay_pause_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('kaManeKachuwaUi.edit',$kaManeKachuwaUiData->id)}}" class="btn btn-info">Edit</a>
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

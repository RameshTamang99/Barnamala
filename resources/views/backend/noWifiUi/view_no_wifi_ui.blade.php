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
				  <h3 class="box-title">No Wifi Ui Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Model Image</th>
                                <th>Reconnect Button Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $noWifiUiData)
							<tr>
                                <td>{{$noWifiUiData->id}}</td>
                                <td>
                                    @if($noWifiUiData->model_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/no_wifi_ui_image/'.$noWifiUiData->model_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($noWifiUiData->reconnect_btn_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/no_wifi_ui_image/'.$noWifiUiData->reconnect_btn_image)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('noWifiUi.edit',$noWifiUiData->id)}}" class="btn btn-info">Edit</a>
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

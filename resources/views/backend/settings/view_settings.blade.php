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
				  <h3 class="box-title">Settings  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5"  data-toggle="modal" data-target="#updateSettings">Update Settings</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Auto Play Timer</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $settings)
							<tr>
                                <td>{{$settings->id}}</td>
                                <td>{{$settings->autoplay_timer}}</td>
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


  <div class="modal fade" id="updateSettings" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h5 class="modal-title">Update Settings</h5>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <form method="post" action="{{ route('settings.update',$respData1->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @error('autoplay_timer')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Auto Play Timer<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="number" name="autoplay_timer" class="form-control"
                                                        required="" value="{{ $respData1->autoplay_timer }}">
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

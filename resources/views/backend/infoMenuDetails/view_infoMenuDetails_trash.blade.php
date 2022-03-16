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
				  <h3 class="box-title">InfoMenuDetails Trashed Lists</h3>
                  <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5"
                  data-toggle="modal" data-target="#addInfoMenuDetails">Add Info Menu Detials</a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Background Image</th>
								<th>Audio</th>
                                <th>video</th>
                                <th>Order</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $imd)
							<tr>
								<td>{{$imd->id}}</td>
								<td>{{$imd->imd_name}}</td>
                                <td>{{$imd->imd_description}}</td>
                                <td>
                                    @if($imd->imd_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/imd_image/'.$imd->imd_image)}}" height="100px"
                                        width="150px">
                                    @endif
                                </td>
                                <td>
                                    @if($imd->imd_background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/imd_background_image/'.$imd->imd_background_image)}}" height="100px"
                                        width="150px">
                                    @endif
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/imd_audio/'.$imd->imd_audio)}}"
                                            type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>
                                    <a href="{{'https://vimeo.com/'.$imd->imd_video}}">{{$imd->imd_name}} Video</a>
                                </td>
                                <td>{{$imd->imd_order}}</td>
								<td>

                                    <a href="{{route('infoMenuDetails.restore',$imd->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('infoMenuDetails.permanentDelete',$imd->id)}}" class="btn btn-danger" id="delete">Delete</a>
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


			  <!-- /.box -->
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>

  <div class="modal fade" id="addInfoMenuDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Information Menu Details</h5>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('infoMenuDetails.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @error('menu_id')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                            <div class="controls">
                                                <input type="hidden" name="menu_id" value="{{ $id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('imd_name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="imd_name" class="form-control"
                                                            required="" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('imd_description')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="imd_description" placeholder="Enter Description" cols="50" rows="10" required=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @error('imd_image')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="imd_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @error('imd_background_image')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Background Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="imd_background_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @error('imd_audio')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Audio</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="imd_audio">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @error('imd_video')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Video</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="imd_video">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="submit">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

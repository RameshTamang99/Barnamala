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
				  <h3 class="box-title">Literature Category Details Trashed Lists</h3>
                  <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5"
                  data-toggle="modal" data-target="#addLitCatDetails">Add Literature Category Detials</a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Title Name</th>
                                <th>Thumbnail Image</th>
                                <th>video</th>
                                <th>Order</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $lcd)
							<tr>
								<td>{{$lcd->id}}</td>
								<td>{{$lcd->title_name}}</td>
                                <td>
                                    @if($lcd->thumbnail_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_category_details_thumbnail_image/'.$lcd->thumbnail_image)}}" height="100px"
                                        width="150px" >
                                    @endif
                                </td>
                                <td>
                                    <a href="{{'https://vimeo.com/'.$lcd->vimeo_id}}">{{$lcd->title_name}} Video</a>
                                </td>
                                <td>{{$lcd->order}}</td>
								<td>

                                    <a href="{{route('literatureCategoryDetails.restore',$lcd->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('literatureCategoryDetails.permanentDelete',$lcd->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

  <div class="modal fade" id="addLitCatDetails" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Literature Category Details</h5>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('literatureCategoryDetails.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @error('category_id')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                            <div class="controls">
                                                <input type="hidden" name="category_id" value="{{ $id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    @error('title_name')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                    <h5>Title Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="title_name" class="form-control"
                                                            required="">
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
                                                @error('thumbnail_image')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Thumbnail Image</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="thumbnail_image">
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
                                                @error('vimeo_id')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                                <h5>Video</h5>
                                                <div class="form-group">
                                                    <div class="panel-content">
                                                        <input type="file" name="vimeo_id">
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

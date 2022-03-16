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
				  <h3 class="box-title">Flip Games Trashed Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addFlipGames">Add Flip Games </a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Image</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $flipgames)
							<tr>
								<td>{{$flipgames->id}}</td>
                                <td>
                                    <img src="{{asset('public/uploads/flipgames_image/'.$flipgames->flipgames_image)}}" height="50px"
                                        width="50px" >
                                </td>
								<td>
                                    <a href="{{route('flipGames.restore',$flipgames->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('flipGames.permanentDelete',$flipgames->id)}}" class="btn btn-danger" id="delete">Delete</a>
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





@endsection

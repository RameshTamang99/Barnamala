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
				  <h3 class="box-title">Flip Games  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5"  data-toggle="modal" data-target="#addFlipGames">Add Flipgames</a>
                <a href="{{route('flipGames.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Flipgames Trash</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Image</th>
								<th width="25%">Action</th>

							</tr>
						</thead>
						<tbody id="flipgamestablecontents">
                        @foreach($allData as $key => $flipgames)
							<tr>
                                <td>{{$flipgames->id}}</td>
                                <td>
                                    <img src="{{asset('public/uploads/flipgames_image/'.$flipgames->flipgames_image)}}" height="50px"
                                        width="50px" >
                                </td>
								<td>
                                    <a href="{{route('flipGames.edit',$flipgames->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('flipGames.delete',$flipgames->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

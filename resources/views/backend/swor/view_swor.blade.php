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
				  <h3 class="box-title">Swor  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addSwor">Add swor</a>
                <a href="{{route('swor.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">swor Trash</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th width="20px">#</th>
								<th width="5%">SN</th>
								<th>Name</th>
								<th>Audio</th>
                                <th>Order</th>
								<th width="25%">Action</th>

							</tr>
						</thead>
						<tbody id="swortablecontents">
                        @foreach($allData as $key => $swor)
                            <tr id="{{$swor->swor_order}}" >
                                <input type="hidden" class="id_swors" value="{{$swor->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$swor->id}}">{{$swor->id}}</td>
								<td>{{$swor->swor_name}}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/swor_audio/'.$swor->swor_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$swor->swor_order}}</td>
								<td>
                                    <a href="{{route('swor.edit',$swor->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('swor.delete',$swor->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

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
				  <h3 class="box-title">Sankhya  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addSankhya">Add Sankhya</a>
                <a href="{{route('sankhya.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Sankhya Trash</a>
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
						<tbody id="sankhyatablecontents">
                        @foreach($allData as $key => $sankhya)
                            <tr id="{{$sankhya->sankhya_order}}" >
                                <input type="hidden" class="id_sankhyas" value="{{$sankhya->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$sankhya->id}}">{{$sankhya->id}}</td>
								<td>{{$sankhya->sankhya_name}}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/sankhya_audio/'.$sankhya->sankhya_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$sankhya->sankhya_order}}</td>
								<td>
                                    <a href="{{route('sankhya.edit',$sankhya->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('sankhya.delete',$sankhya->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

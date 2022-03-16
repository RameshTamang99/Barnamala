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
				  <h3 class="box-title">Barakhari  Lists</h3>
                <a href="{{route('barakhari.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Barakhari</a>
                <a href="{{route('barakhari.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Barakhari Trash</a>
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
								<th width="25%">Act
								ion</th>

							</tr>
						</thead>
						<tbody id="barakharitablecontents">
                        @foreach($allData as $key => $barakhari)
                        <tr id="{{$barakhari->barakhari_order}}" >
                                <input type="hidden" class="id_barakharis" value="{{$barakhari->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td class="ids" data-id = "{{$barakhari->id}}">{{$barakhari->id}}</td>
								<td>{{$barakhari->barakhari_name}}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/barakhari_audio/'.$barakhari->barakhari_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$barakhari->barakhari_order}}</td>
								<td>
                                    <a href="{{route('barakhari.edit',$barakhari->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('barakhari.delete',$barakhari->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

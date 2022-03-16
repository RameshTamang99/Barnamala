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
				  <h3 class="box-title">Barakhari Trashed Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addBarakhari">Add Barakhari </a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
								<th>Audio</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $barakhari)
							<tr>
								<td>{{$barakhari->id}}</td>
								<td>{{$barakhari->barakhari_name}}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/barakhari_audio/'.$barakhari->barakhari_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$barakhari->barakhari_order}}</td>
								<td>
                                    <a href="{{route('barakhari.restore',$barakhari->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('barakhari.permanentDelete',$barakhari->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

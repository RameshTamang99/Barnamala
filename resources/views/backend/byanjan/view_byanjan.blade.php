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
				  <h3 class="box-title">Byanjan  Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addByanjan">Add Byanjan</a>
                <a href="{{route('byanjan.trashView')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Byanjan Trash</a>
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
                                {{-- <th>Order</th> --}}
								<th width="25%">Action</th>

							</tr>
						</thead>
						<tbody id="tablecontents">
						@php
							$counter = 1 ; 
						@endphp
                        @foreach($allData as $key => $byanjan)

							{{-- <tr id="{{$byanjan->byanjan_order}}" > --}}
							<tr id="{{$counter}}" >
                                <input type="hidden" class="id_byanjans" value="{{$byanjan->id}}" >
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
								<td class="ids" data-id = "{{$byanjan->id}}">{{$byanjan->id}}</td>
								<td>{{$byanjan->byanjan_name}}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/byanjan_audio/'.$byanjan->byanjan_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                {{-- <td>{{$byanjan->byanjan_order}}</td> --}}
								<td>
                                    <a href="{{route('byanjan.edit',$byanjan->id)}}" class="btn btn-info" >Edit</a>
                                    <a href="{{route('byanjan.delete',$byanjan->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
							</tr>
						@php
							$counter++ ;
						@endphp
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

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
				  <h3 class="box-title">Byanjan Lists</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                {{-- <th>Order</th> --}}
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
							@php
							$counter = 1 ; 
						@endphp
                        @foreach($allData as $key => $byanjan)
                        <tr>
                                {{-- <td>{{$byanjan->id}}</td></td> --}}
								<tr id="{{$counter}}" >
								<td>{{$byanjan->byanjan_name}}</td>
                                <td>{{$byanjan->byanjan_order}}</td>
								<td>
                                    <a href="{{route('barakhari.view',$byanjan->id)}}" class="btn btn-success">View Barakhari</a>
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

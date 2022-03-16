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
				  <h3 class="box-title">Kmk Trashed Lists</h3>
                <a href="{{route('kmk.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5">Add Ka Mane Kachuwa </a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Image</th>
								<th>Audio</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $kmk)
							<tr>
								<td>{{$kmk->id}}</td>
								<td>{{$kmk->kmk_name}}</td>
                                <td>
                                    @if($kmk->kmk_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/kmk_image/'.$kmk->kmk_image)}}" height="70px" width="70px">
                                    @endif
                                </td>
                                <td>
                                    <audio controls>
                                        <source src="{{asset('public/uploads/kmk_audio/'.$kmk->kmk_audio)}}" type="audio/mpeg">
                                    </audio>
                                </td>
                                <td>{{$kmk->kmk_order}}</td>
								<td>
                                    <a href="{{route('kmk.restore',$kmk->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('kmk.permanentDelete',$kmk->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

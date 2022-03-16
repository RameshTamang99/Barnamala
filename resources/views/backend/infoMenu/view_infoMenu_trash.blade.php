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
				  <h3 class="box-title">Information Menu Trashed Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addInfoMenu">Add Information Menu</a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Description</th>
                                <th>Background</th>
                                <th>Back Icon</th>
                                <th>Card Image</th>
                                <th>Status</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $infoMenu)
							<tr>
								<td>{{$infoMenu->id}}</td>
								<td>{{$infoMenu->name}}</td>
                                <td>{{$infoMenu->description}}</td>
                                <td>
                                    @if($infoMenu->background == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/background/'.$infoMenu->background)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($infoMenu->back_icon == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/back_icon/'.$infoMenu->back_icon)}}" height="70px"
                                        width="70px">
                                    @endif
                                </td>
                                <td>
                                    @if($infoMenu->card_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/card_image/'.$infoMenu->card_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>{{$infoMenu->status}}</td>
                                <td>{{$infoMenu->order}}</td>
								<td>
                                    <a href="{{route('infoMenu.restore',$infoMenu->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('infoMenu.permanentDelete',$infoMenu->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

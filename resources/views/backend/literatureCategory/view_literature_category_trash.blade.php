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
				  <h3 class="box-title">Literature Category Trashed Lists</h3>
                <a href="#" style="float:right;" class="btn btn-rounded btn-success mb-5" data-toggle="modal" data-target="#addLitCat">Add Literature Category</a>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Name</th>
                                <th>Icon Image</th>
                                <th>Background Image Details</th>
                                <th>Back Button Details</th>
                                <th>Card Button Details</th>
                                <th>Status</th>
                                <th>Order</th>
								<th width="25%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $literatureCategory)
							<tr>
								<td>{{$literatureCategory->id}}</td>
								<td>{{$literatureCategory->name}}</td>
                                <td>
                                    @if($literatureCategory->icon_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_category_icon_image/'.$literatureCategory->icon_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($literatureCategory->bg_image_details == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_category_bg_image_details/'.$literatureCategory->bg_image_details)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($literatureCategory->back_button_details == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_category_back_button_details/'.$literatureCategory->back_button_details)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($literatureCategory->card_button_details == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/literature_category_card_button_details/'.$literatureCategory->card_button_details)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>{{$literatureCategory->status}}</td>
                                <td>{{$literatureCategory->order}}</td>
								<td>
                                    <a href="{{route('literatureCategory.restore',$literatureCategory->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{route('literatureCategory.permanentDelete',$literatureCategory->id)}}" class="btn btn-danger" id="delete">Delete</a>
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

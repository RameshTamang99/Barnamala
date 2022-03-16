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
				  <h3 class="box-title">Sign Up Screen  Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Header Text Image</th>
                                <th>Sign Up Botton Image</th>
                                <th>Login Botton Image</th>
                                <th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $signUpScreenData)
							<tr>
                                <td>{{$signUpScreenData->id}}</td>
                                <td>
                                    @if($signUpScreenData->header_text_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/sign_up_screen_ui_image/'.$signUpScreenData->background_image)}}" height="70px"
                                            width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($signUpScreenData->header_text_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/sign_up_screen_ui_image/'.$signUpScreenData->header_text_image)}}" height="70px"
                                        width="70px" >
                                    @endif

                                </td>
                                <td>
                                    @if($signUpScreenData->sign_up_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/sign_up_screen_ui_image/'.$signUpScreenData->sign_up_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($signUpScreenData->login_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/sign_up_screen_ui_image/'.$signUpScreenData->login_button_image)}}" height="70px"
                                            width="70px" >
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('signUpScreen.edit',$signUpScreenData->id)}}" class="btn btn-info">Edit</a>
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

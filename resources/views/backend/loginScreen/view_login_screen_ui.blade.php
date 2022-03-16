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
				  <h3 class="box-title">Login Screen  Lists</h3>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">SN</th>
								<th>Background Image</th>
                                <th>Header Text Image</th>
                                <th>Login Button Image</th>
                                <th>FB Button Image</th>
                                <th>Google Button Image</th>
                                <th>Password Forget Button Image</th>
                                <th>New Account Button Image</th>
                                <th width="8%">Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($allData as $key => $loginScreenData)
							<tr>
                                <td>{{$loginScreenData->id}}</td>
                                <td>
                                    @if($loginScreenData->background_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->background_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->header_text_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->header_text_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->login_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->login_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->fb_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->fb_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->google_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->google_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->password_forget_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->password_forget_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    @if($loginScreenData->new_account_button_image == NULL)
                                        {{ $error }}
                                    @else
                                        <img src="{{asset('public/uploads/login_screen_ui_image/'.$loginScreenData->new_account_button_image)}}" height="70px"
                                        width="70px" >
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('loginScreen.edit',$loginScreenData->id)}}" class="btn btn-info">Edit</a>
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Barnamaala - Verify Email </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('public/backend/css/vendors_css.css')}}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/css/skin_color.css')}}">

</head>
<body class="hold-transition theme-primary bg-gradient-primary">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
								  <div class="row">
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">Submit</button>
                                      {{ __('Resend Verification Email') }}
									</div>
									<!-- /.col -->
								  </div>
							</form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
								  <div class="row">
									<!-- /.col -->
									<div class="col-8 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">Logout</button>
                                      {{ __('Log Out') }}
									</div>
									<!-- /.col -->
								  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('public/backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('public/assets/icons/feather-icons/feather.min.js')}}"></script>

</body>
</html>


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <title>Hamro Barnamala - Reset Password</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="{{ asset('public/assets/auths/style.css') }}" rel="stylesheet">
      <!-- FAVICON -->
    <link href="{{ asset('public/assets/auths/logo.jpg') }}" rel="shortcut icon">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="background"></div>
    <div class="container">
        <div class="row">


             <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                    <div class="modalbox success col-lg-12 center animate" style="width:100%">

                        <input type="hidden" name="token" value="{{ $token }}">

                        
                        <div class="icon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>

                        <h1>Reset Password</h1>


                        <div class="mb-3">

                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>


                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="mb-3">

                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>



                         <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                        </button>
                     <span class="change">-- Thank you --</span>


                    </div>



                    </form>
        </div>
        <!--/.row-->
        <!-- <div class="row">
		<div class="modalbox error col-sm-12 col-12-6 col-lg-5 center animate" style="display: none;">
			<div class="icon">
				<span class="glyphicon glyphicon-thumbs-down"></span>
			</div> -->
        <!--/.icon-->
        <!-- <h1>Oh no!</h1>
			<p>Oops! Something went wrong,
				<br> you should try again.</p>
			<button type="button" class="redo btn">Try again</button>
			<span class="change">-- Click to see opposite state --</span>
		</div> -->
        <!--/.success-->
    </div>
    <!--/.row-->
    </div>
    <!--/.container-->
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    {{-- <script  src="./script.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('.redo').click(function () {
                $('.success, .error').toggle();
            });
        });

    </script>

</body>

</html>

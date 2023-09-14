<!doctype html>
<html lang="en">

<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('css/auth/login.css')}}">

</head>

<body>
	
	<section class="mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url({{asset('images/laptop.jpg')}});">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">SIGN IN</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										{{-- <a href="#"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-facebook"></span></a> --}}
										<a href="/"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-home"></span></a>
									</p>
								</div>
							</div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
								@csrf

								<div class="form-group mb-3">
									<label class="label" for="email">Email</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror"
										name="email" value="{{ old('email') }}" placeholder="Email">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>

								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<div class="input-group">
										<input type="password"
											class="form-control @error('password') is-invalid @enderror" name="password"
											id="password" placeholder="Password">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="fa fa-eye-slash" aria-hidden="true" id="toggle-password"></i>
											</span>
										</div>
									</div>
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>


								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
										In</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" name="remember" id="remember" {{ old('remember')
												? 'checked' : '' }} checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="{{route('password.update')}}">Forgot Password?</a>
									</div>
								</div>
							</form>
							<p class="text-center">Not a member? <a data-toggle="tab"
									href="{{route('register')}}">Create Account?</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('css/auth/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('css/auth/js/popper.js')}}"></script>
	<script src="{{asset('css/authjs/bootstrap.min.js')}}"></script>
	<script src="{{asset('css/auth/js/main.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{asset('js/password.js')}}"></script>




</body>

</html>
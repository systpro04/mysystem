<!doctype html>
<html lang="en">
  <head>
  	<title>REGISTER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('css/auth/register.css')}}">

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
			      			<h3 class="mb-4">SIGN UP</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										{{-- <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a> --}}
										<a href="/" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-home"></span></a>
									</p>
								</div>
			      	</div>
                      
                    <form method="POST" action="{{ route('register') }}"  class="form">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="label" for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" autocomplete="name" autofocus>
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                                <label class="form-check-label" for="Male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                                <label class="form-check-label" for="Female">
                                    Female
                                </label>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
			      			<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
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
                                    id="password" placeholder="Password" autocomplete="new-password">
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

                    <div class="form-group mb-3">
                        <label class="label" for="password_confirmation">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye-slash" aria-hidden="true" id="toggle-confirm-password"></i>
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
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
		            </div>
		          </form>
		          <p class="text-center">Already a member? <a data-toggle="tab" href="{{route('login')}}">Log In</a></p>
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
    <script src="{{asset('js/password.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{{asset('js/password.js')}}"></script>


</body>
</html>




<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Payment Admin Template">
	<meta property="og:title" content="Dompet : Payment Admin Template">
	<meta property="og:description" content="Dompet : Payment Admin Template">
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Register</title>
	
	<!-- FAVICONS ICON -->
    <link href="{{asset('style/css/style.css')}}" rel="stylesheet">


</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" name="name"  class="form-control" placeholder="username">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password"   name="password" class="form-control" value="">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password confirmation</strong></label>
                                            <input type="password"    name="password_confirmation"class="form-control" value="">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('style/vendor/global/global.min.js')}}"></script>
<script src="{{asset('style/js/custom.min.js')}}"></script>
<script src="{{asset('style/js/dlabnav-init.js')}}"></script>
<script src="{{asset('style/js/styleSwitcher.js')}}"></script>
</body>
</html>
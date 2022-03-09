<!doctype html>
<html lang="en">

<head>
<title>Admin Login | Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{get_setting('meta_description')}}">
<meta name="author" content="Baba Al Ameen JR. NGOM">

<link rel="icon" href="{{get_setting('favicon')}}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/color_skins.css')}}">
</head>

<body class="theme-cyan">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="text-center top">
                        <img src="{{asset(get_setting('logo'))}}" alt="CCSS">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Connexion dans le Panneau d'administration</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{route('admin.login')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="signin-email" class="sr-only control-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus id="email" placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="sr-only control-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Password">
                                    @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="clearfix form-group">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>

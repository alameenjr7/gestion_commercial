<!doctype html>
<html lang="en">

<head>
<title>:: Lucid :: 500</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
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
                    <div class="top">
                        <img src="{{asset('frontend/assets/img/core-img/logo.png')}}" alt="Lucid">
                    </div>
					<div class="card">
                        <div class="header">
                            <h3>
                                <span class="clearfix title">
                                    <span class="number">500</span> <br>
                                    <span>Internal Server Error</span>
                                </span>
                            </h3>
                        </div>
                        <div class="body">
                            <p>Apparently we're experiencing an error. But don't worry, we will solve it shortly.
                                <br>Please try after some time.</p>
                            <p><a href="{{route('admin')}}" class="btn btn-primary"><i class="fa fa-home"></i> <span>Accueil</span></a></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>


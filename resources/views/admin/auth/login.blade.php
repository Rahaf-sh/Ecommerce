<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/css/dashboard.css" type="text/css">
</head>
 
<body class="vertical-layout vertical-menu-modern" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel">

<div class="container">
	<div class="screen">
		<div class="screen__content">
       
        <form class="auth-login-form mt-2 login" action="{{route('adminLoginPost')}}" method="post">
				@csrf
        <h2>Admin Login</h2>
        
        <div class="login__field">
					<i class="login__icon fas fa-user"></i>
                    <input type="text" class="form-control login__input" id="email" name="email" value="{{old('email') }}" autofocus />
                    @if ($errors->has('email'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <input type="password" class="form-control form-control-merge login__input" id="password" name="password" tabindex="2" />
                    @if ($errors->has('password'))
                            <span class="help-block font-red-mint">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
				</div>
                @if(\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            {{ \Session::forget('success') }}
            @if(\Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ \Session::get('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
				<button class="button login__submit" type="submit">
					<span class="button__text">Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
 
</html>

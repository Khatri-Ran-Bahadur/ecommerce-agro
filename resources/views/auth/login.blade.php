
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Francois+One:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
    body {
        color: #fff;
        background: #f1f1f1;
        font-family: 'Open Sans', sans-serif;
    }
    .form-control {
        min-height: 41px;
        background: #fff;
        border-color: #e3e3e3;
        box-shadow: none !important;
        border-radius: 4px;
    }   
    .form-control:focus {
        border-color: #99c432;
    }
    .login-form {
        width: 310px;
        margin: 0 auto;
        padding: 100px 0 30px;      
    }
    .login-form form {
        color: #999;
        border-radius: 10px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;  
        position: relative; 
    }
    .login-form h2 {        
        font-size: 24px;
        color: #454959;
        margin: 45px 0 25px;
        font-family: 'Francois One', sans-serif;
    }
    .login-form .avatar {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -50px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #70c5c0;
        padding: 15px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .login-form .avatar img {
        width: 100%;
    }
    .login-form .btn {
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .login-btn {        
        font-size: 16px;
        font-weight: bold;
        background: #99c432;        
        margin-bottom: 20px;
    }
    .login-btn:hover, .login-btn:active {
        background: #86ac2d !important;
    }
    .social-btn {
        padding-bottom: 15px;
    }
    .social-btn .btn {      
        margin-bottom: 10px;
        font-size: 14px;
        text-align: left;
    }   
    .social-btn .btn:hover {
        opacity: 0.8;
        text-decoration: none;
    }   
    .social-btn .btn-primary {
        background: #507cc0;
    }
    .social-btn .btn-info {
        background: #64ccf1;
    }
    .social-btn .btn-danger {
        background: #df4930;
    }
    .social-btn .btn i {
        float: left;
        margin: 1px 10px 0 5px;
        min-width: 20px;
        font-size: 18px;
    }
    .or-seperator {
        height: 0;
        margin: 0 auto 20px;
        text-align: center;
        border-top: 1px solid #e0e0e0;
        width: 30%;
    }
    .or-seperator i {
        padding: 0 10px;
        font-size: 15px;
        text-align: center;
        background: #fff;
        display: inline-block;
        position: relative;
        top: -13px;
        z-index: 1;
    }
    .login-form a {
        color: #fff;
        text-decoration: underline;
    }
    .login-form form a {
        color: #999;
        text-decoration: none;
    }   
    .login-form a:hover, .login-form form a:hover {
        text-decoration: none;
    }
    .login-form form a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="login-form">
    <form method="POST" action="{{ route('login') }}">
         @csrf
        <div class="avatar">
            <img src="{{asset('images/loginn.png')}}" alt="Avatar" />
        </div>
    </br>
    </br>
    </br>
        <div class="form-group">
            <input type="email" id="email" class="form-control" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror     
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>  
        <div class="input-group row">
            <div class="col-md-8 offset-md-4">
                <div class="form-check">
                    <input class="form-group" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-group" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign in</button>
        </div>
        <p class="text-center small" ><a href="#">Forgot Password?</a></p>
    </form>
    <p class="text-center small" style="color: #000;">Don't have an account? <a href="{{route('register')}}" style="color: #000;">Sign up here!</a></p>
</div>
</body>
</html>                            









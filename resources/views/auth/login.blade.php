@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');


/* body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
} */

.contain {
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, #a45454, #b87878);		
	position: relative;	
	height: 600px;
	width: 340px;	
	box-shadow: 0px 0px 24px #965656;
    border-radius: 0 20px 0 20px
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #ac6363;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #a45454, #9e6767);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #b97b7b;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 156px;
}

.login__field {
	padding: 10px 0px;	
	position: relative;	
	display: flex;
	align-items: center	
}

.login__icon {
	position: absolute;
	left: 5px;
	color: #b57575;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 400;
	width: 75%;
	transition: .2s;
    border-radius: 20px;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #9e6767;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 400;
	display: flex;
	align-items: center;
	width: 100%;
	color: #9d4848;
	box-shadow: 0px 2px 2px #965656;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #9e6767;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #b57575;
}
button span{
    font-weight: 700;
}
</style>
    <div class="contain">
        <div class="screen">
            <div class="screen__content">
                <form autocomplete="off" class="login" method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" name="email" type="email" class="login__input" autocomplete="off" value="{{ old('email') }}" placeholder="User name / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" id="password" name="password" type="password" class="login__input" autocomplete="off" value="{{ old('password') }}" placeholder="Password">
                    </div>
					@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p><i class='bx bx-error-alt'></i> {{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <button class="button login__submit" type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <span class="button__text">{{ __('Login') }}</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>	
                    
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif			
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
@endsection

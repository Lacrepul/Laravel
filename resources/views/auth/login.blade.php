@extends('products.layout')

@section('header')
    <div id="header" class="text">
        {{__('changeLang.NOTEBOOK')}}
    </div>
@endsection

@section('content')
<a href="/en"><img src="/icons/EN.png"></a>
<a href="/ru"><img src="/icons/RU.png"></a>
	<div id="container" class="container">

		<form action="{{ route('register', app()->getLocale()) }}">
			<button type="submit" class="btn btn-outline-success">{{__('changeLang.Register')}}</button>
		</form>

		<form action="{{ route('login', app()->getLocale()) }}" style="margin-top:15px;" method="POST">
			@csrf
			<div class="form-group">
				<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{__('changeLang.Email')}}">
				
				@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{__('changeLang.Password')}}">
				
				@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>
			<button type="submit" class="btn btn-outline-success">{{__('changeLang.Login')}}</button>
		</form>
	</div>
@endsection
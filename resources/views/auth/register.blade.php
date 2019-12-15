@extends('products.layout')

@section('header')
    <div id="header" class="text">
        {{__('changeLang.NOTEBOOK')}}
    </div>
@endsection

@section('content')
	<div class="container" id="container">

		<form action="{{ route('login', app()->getLocale()) }}" method="GET">
			<button class="btn btn-outline-info" type="submit">
				{{__('changeLang.Back')}}
			</button>
		</form>

		<form action="{{ route('register', app()->getLocale()) }}" method="POST" id="signInId">
			@csrf
			<div class="form-group">
				<input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="{{ __('changeLang.Username') }}" name="name">
				
				@error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="{{ __('changeLang.Password') }}" name="password">
				
				@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input class="form-control" type="password" placeholder="{{ __('changeLang.ConfirmPassword') }}" name="password_confirmation">
			</div>
			
			<div class="form-group">
				<input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="{{ __('changeLang.Email') }}" name="email">
				
				@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>
				<button class="btn btn-outline-success" type="submit">
					{{ __('changeLang.Register') }}
				</button>
		</form>
	</div>
@endsection
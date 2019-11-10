@extends('products.layout')

@section('header')
    <div id="header" class="text">
        NOTEBOOK
    </div>
@endsection

@section('content')
	<div class="container" id="container">

		<form action="/" method="GET">
			<button class="btn btn-outline-info" type="submit">
				Back
			</button>
		</form>

		<form action="{{ route('register')}}" method="POST" id="signInId">
			@csrf
			<div class="form-group">
				<input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Username" name="name">
				
				@error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
				
				@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
			</div>
			
			<div class="form-group">
				<input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email">
				
				@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>
				<button class="btn btn-outline-success" type="submit">
					Registration
				</button>
		</form>
	</div>
@endsection
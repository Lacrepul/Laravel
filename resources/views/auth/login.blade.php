@extends('products.layout')

@section('header')
    <div id="header" class="text">
        NOTEBOOK
    </div>
@endsection

@section('content')
<a href="/en">English(dont work!)</a>
	</style>
	<div id="container" class="container">

		<form action="register">
			<button type="submit" class="btn btn-outline-success">Register</button>
		</form>

		<form action="{{ route('login') }}" style="margin-top:15px;" method="POST">
			@csrf
			<div class="form-group">
				<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
				
				@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>

			<div class="form-group">
				<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
				
				@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				
			</div>
			<button type="submit" class="btn btn-outline-success">Login</button>
		</form>
	</div>
@endsection
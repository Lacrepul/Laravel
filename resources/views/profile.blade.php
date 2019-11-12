@extends('products.layout')

@section('logout')
    <form action="{{route('logout', app()->getLocale())}}" method="POST">
        @csrf
        <button type="submit" id="logoutButt" class="btn btn-outline-info">
            {{__('changeLang.Logout')}}
        </button>
    </form>
@endsection

@section('profileHead')
	<div class="text" id="header">
		Your profile
	</div>
@endsection

@section('content')
	<div class="container" id="container">

			<div class="pull-right">
				<a class="btn btn-outline-success" id="back" href="{{ route('products.index', app()->getLocale()) }}"> {{__('changeLang.Back')}}</a>
			</div>

			<div class="form-group" id="username">
				<input type="text" class="form-control" name="usernameProfile" placeholder="{{$user['name']}}" readonly>
			</div>

			<form method="POST" action="{{ route('password.email', app()->getLocale()) }}">
				@csrf
				<div class="form-group">
					<input type="email" class="form-control" value="{{$user['email']}}" name="email" placeholder="{{$user['email']}}" readonly>
				</div>
			<button type="submit" id="saveId" class="btn btn-outline-success">Change password</button>
			</form>		

	</div>
	<div class="alert alert-light" role="alert" id="footer">
		&copy;Copyright by Poul Vasenev, 2019 
	</div>
@endsection

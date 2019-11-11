@extends('products.layout')

@section('logout')
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-info" id="logoutButt">
            Logout
        </button>
    </form>
@endsection

@section('profileButt')
    <form action="profile" method="GET">
        <button type="submit" class="btn btn-outline-success" id="profileButt">
            Profile
        </button>
    </form>
@endsection

@section('header')
    <div class="text" id="header">
        NOTEBOOK
    </div>
@endsection

  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Note</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="hidden" name="nameUser" class="form-control" value="{{$user['name']}}" placeholder="Name">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Your note"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </div>
   
</form>
@endsection
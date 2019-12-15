@extends('products.layout')

@section('logout')
    <form action="{{route('logout', app()->getLocale())}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-info" id="logoutButt">
        {{ __('changeLang.Logout') }}
        </button>
    </form>
@endsection

@section('header')
    <div class="text" id="header">
    {{ __('changeLang.AddNewNote') }}
    </div>
@endsection

  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('products.index', app()->getLocale()) }}"> {{__('changeLang.Back')}}</a>
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
   
<form action="{{ route('products.store', app()->getLocale()) }}" method="POST">
    @csrf

    <input type="hidden" name="nameUser" class="form-control" value="{{$user['name']}}">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <br>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="{{__('changeLang.Name')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <textarea class="form-control" style="height:150px" name="detail" placeholder="{{__('changeLang.YourNote')}}"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-info">{{__('changeLang.Submit')}}</button>
        </div>
    </div>
   
</form>
@endsection
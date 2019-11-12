@extends('products.layout')

@section('logout')
    <form action="{{route('logout', app()->getLocale())}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-info" id="logoutButt">
            {{ __('changeLang.Logout') }}
        </button>
    </form>
@endsection

@section('profileButt')
    <form action="profile" method="GET">
        <button type="submit" class="btn btn-outline-success" id="profileButt">
        {{ __('changeLang.Profile') }}
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
            <div class="col-5" >
                <a class="btn btn-info btn-block" id="createNewNote" href="{{ route('products.create', app()->getLocale()) }}"> {{ __('changeLang.CreateNewNote') }}</a>
                    <ul class="list-group">
                        @foreach ($products as $product)
                            @if (Auth::user()->name == $product->nameUser)
                                <li class="list-group-item" id="listGroupItem">
                                    <input type="text" class="btn btn-outline-secondary" disabled style="width:10%" id="inputNumberId{{$i}}" name="inputNumberName" value="{{$i}}" readonly>
                                    <input type="text" class="btn btn-outline-secondary" disabled style="width:88%" id="inputNameId{{$i}}" name="inputNameName" value="{{ $product->name }}" readonly>
                                    <input type="hidden" id="inputDetailId{{$i}}" name="inputDetailName" value="{{ $product->detail }}" readonly>
                                    
                                    <button class="btn btn-secondary" type="button" id="buttonId{{$i}}" style="width: 32%;margin-top:5px;" name="buttonName2">{{ __('changeLang.Show') }}</button>
                                    <button type="button" class="btn btn-secondary" id="buttonEditId{{$i}}" style="width: 32%;margin-top:5px;" name="buttonName">{{ __('changeLang.Edit') }}</button>

                                    <!-- Немогу отправить Route с двумя параметрами для удаления, поэтому hidden inputs -->
                                    <form action="/en/destroy" style="display: inline" method="POST">
                                        @csrf
                                        <input type="hidden" name="destroyName" value='{{$product->id}}'>
                                        <input type="hidden" name="langName" value='{{app()->getLocale()}}'>
                                        <button type="submit" class="btn btn-secondary" style="width: 32%;margin-top:5px;">{{ __('changeLang.Delete') }}</button>
                                    </form>

                                    <!--                                      -->
                                    <input type="hidden" id="inputHiddenForId{{$i}}" value="{{$product->id}}" readonly>
                                    <!--      Нельзя спрятать JS в отдельный файл, так как используется blade                                -->
                                    
                                    <script>
                                        buttonId{{$i}}.onclick = showButt;
                                        buttonEditId{{$i}}.onclick = editButt;
                                        function showButt(){
                                            textAreaId.value = inputDetailId{{$i}}.value;
                                            textAreaId.readOnly = true;
                                            buttonSaveId.hidden = true;
                                        }

                                        function editButt(){
                                            inputSaveIdName.value = inputHiddenForId{{$i}}.value;
                                            hiddenInput.value = inputNumberId{{$i}}.value;
                                            textAreaId.value = inputDetailId{{$i++}}.value;
                                            textAreaId.readOnly = false;
                                            buttonSaveId.hidden = false;
                                        }
                                    </script>
                                    
                                </li>    
                            @endif
                        @endforeach         
                    </ul>
            </div>   
 
<!--  -->
        <div class="col-7">
            <ul class="list-group">
                <div class="btn btn-success btn-block" id="textareaHeader">{{ __('changeLang.Your Note') }}</div>
                    <form id="saveForm" method="POST">
                        <textarea class = "form-control" name="detail" id="textAreaId" readonly></textarea>
                        <input type="hidden" id="hiddenInput" name="hiddenInputName" value="">
                        <input type="hidden" id="inputSaveIdName" name="inputSaveIdName" value="" readonly>
                    </form>
                
                <button hidden class="btn btn-success btn-block" type="button" id="buttonSaveId" name="buttonSaveName">Save</button>
            </ul>
        </div>
    </div>

@endsection
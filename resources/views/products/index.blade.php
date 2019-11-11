@extends('products.layout')

@section('logout')
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-info" style="position:fixed; width:100px;">
            Logout
        </button>
    </form>
@endsection

@section('profileButt')
    <form action="profile" method="GET">
        <button type="submit" class="btn btn-outline-success" style="position:fixed;right:0; width:100px;">
            Profile
        </button>
    </form>
@endsection

@section('header')
    <div class="text"  style="text-align:center; font-family: 'Liu Jian Mao Cao', cursive; font-size:80px; color:grey;">
        NOTEBOOK
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
        <table class="table table-bordered">
            <tr>
                <th width="5px">No</th>
                <th width="20px">Name</th>
                <th width="80px">Action</th>
            </tr>
        
            <?php $user = Auth::user()?>

            @foreach ($products as $product)
                @if ($user['name'] == $product->nameUser)

                    <tr>
                    
                        <form id="productIdForm{{$i}}" name="productNameForm" method="POST">

                            <td><input width="5px" type="text" id="inputNumberId" name="inputNumberName" value="{{$i}}" readonly></td>
                            <td><input type="text" id="inputNameId" name="inputNameName" value="{{ $product->name }}" readonly></td>
                            <input type="hidden" id="inputDetailId{{++$i}}" name="inputDetailName" value="{{ $product->detail }}" readonly>

                        </form>
                        
                        <td>
                          
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" id="buttonId{{$i}}" name="buttonName2">show</button>
                            <button type="button" id="buttonEditId{{$i}}" name="buttonName">edit</button>                                
                            <button type="button" id="buttonSaveId{{$i}}" name="buttonSaveName">save</button>

                            <form id="saveForm{{$i}}" method="POST">
                                <input type="hidden" name="inputSaveIdName" value="{{$product->id}}" readonly>
                                <input type="textarea" class = "form-control" style="height:50px" id='editDetailInputId{{$i}}' name='detail'>
                            </form>



                            <script>
                                buttonEditId{{$i}}.onclick = editButt;
                                function editButt(){
                                    editDetailInputId{{$i}}.value = inputDetailId{{$i}}.value;
                                }
                            </script>
                            <script>
                                buttonSaveId{{$i}}.onclick = saveChanges;
                                async function saveChanges(){
                                    let response = await fetch('/update', {
                                    headers : {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content//,
                                       // 'Content-Type':'application/json',
                                        //'Accept':'application/json'
                                    },
                                    method: 'POST',
                                    body: new FormData(saveForm{{$i}})
                                    });

                                    let result = await response.text();
                                    
                                    inputDetailId{{$i}}.value = result;
                                    textId2.innerHTML = inputDetailId{{$i}}.value;
                                }
                            </script>

                            <script>
                                buttonId{{$i}}.onclick = showButt;
                                function showButt(){
                                    textId2.innerHTML = inputDetailId{{$i}}.value;
                                }
                            </script>

                        </td>

                    </tr>
                    
                 @endif
            @endforeach
        </table>

    <div id='textId2'></div>

    {!! $products->links() !!}
      
@endsection
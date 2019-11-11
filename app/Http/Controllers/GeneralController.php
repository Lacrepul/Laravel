<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;

class GeneralController extends Controller
{
    function showProfile(){
        return view('/profile')
            ->with('user', Auth::user());
    }

    function showLogin(){
        return view('/auth/login');
    }

    public function doUpdate (Request $request){
        $id = $request['inputSaveIdName'];
        $updatedStr = Product::find($id);
        $updatedStr->detail = $request->detail;
        $updatedStr->save();
        return $request;
    }  

}

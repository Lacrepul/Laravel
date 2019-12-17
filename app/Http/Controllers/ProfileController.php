<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function showProfile(){
        return view('/profile')
            ->with('user', Auth::user());
    }

}

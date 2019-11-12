<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use Auth;
use App;

class DestroyController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    //Почему неработает модель Product $product?
    public function destroy(Request $request)
    {
        echo $request['langName'];
        Product::destroy($request['destroyName']);
        return redirect($request['langName'].'/products');
    }
}
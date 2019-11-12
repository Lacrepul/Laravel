<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use Auth;

class DestroyController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    //Почему неработает модель Product $product?
    public function destroy($product)
    {
        Product::destroy($product);
        return redirect()->route('products.index', "en");
    }
}
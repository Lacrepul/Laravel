<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(100);
  
        return view('test',compact('products'))
            ->with('i', 1);
    }
   
    public function create()
    {
        return view('products.create')
            ->with('user', Auth::user());
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'            
        ]);
  
        Product::create($request->all());
        return redirect()->route('products.index', app()->getLocale());
    } 

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return back();
    }

    public function doUpdate (Request $request){
        $id = $request['inputSaveIdName'];
        $updatedStr = Product::find($id);
        $updatedStr->detail = $request->detail;
        $updatedStr->save();
        return $request;
    }  

}
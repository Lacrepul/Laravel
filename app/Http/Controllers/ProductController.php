<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UpdatePost;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(100);
  
        return view('note',compact('products'))
            ->with('i', 1);
    }
   
    public function create()
    {
        return view('productsOperations.create')
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

    public function doUpdate (UpdatePost $request){

        $request->validate([
            'detail' => 'required|min:5',  
        ]);

        $id = $request['inputSaveIdName'];
        $updatedStr = Product::find($id);
        $updatedStr->detail = $request->detail;
        $updatedStr->save();
        return $request;
    }  

}
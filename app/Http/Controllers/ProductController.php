<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;
    protected $repository;


    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        
    }
    public function index()
    {

        //$products = Product::all();
        $products = Product::latest()->paginate(20);

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);

        /*
        $data = 123;
        $data2 = 987;
        $products = ['TV', 'Refrigerador', 'DVD', 'Notebook'];

        return view('admin.pages.products.index', ['data' => $data]);
        return view('admin.pages.products.index', compact('data', 'data2', 'products'));*/
    }

    public function show($id = null)
    {
        //$product = Product::where('id', $id)->first();
        $product = Product::find($id);
        
        if(!$product){
            return redirect()->back();
        }
        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        
        if(!$product){
            return redirect()->back();
        }
        return view('admin.pages.products.edit', [
            'product' => $product
        ]);
    }

    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        if($request->hasFile('image') && $request->image->isValid()){
           $imagePath = $request->image->store('products');

           $data['image'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('products.index');
        /*
        $request->validate([
            'name' => 'required|min:3|max:80',
            "description" => 'nullable|min:3|max:90',
            'photo' => 'required|image',
        ]);
        */

        //return dd($request->all());
        //return dd($request->only('name'));
        //return dd($request->input('teste', 'default'));
        //return dd($request->except('_token'));

        /*if ($request->file('photo')->isValid()) {
            $fileName = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $fileName));
        }*/
    }

    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        
        if(!$product){
            return redirect()->back();
        }

        $data = $request->all();

        if($request->hasFile('image') && $request->image->isValid()){

            if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $imagePath = $request->image->store('products');
 
            $data['image'] = $imagePath;
         }

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        
        if(!$product){
            return redirect()->back();
        }

        if($product->image && Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
        
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}

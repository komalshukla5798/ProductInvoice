<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Products.
     *
     * @return \Illuminate\Http\Response or @return View
     */
    public function index()
    {
       if(request()->ajax()){
			$products = Product::Desc()->paginate(5);
		 	$html = view('products.list',compact('products'))->render();
		 	return response()->json($html);
		}else{
			$categories = Category::Desc()->get();
			return view('products.index',compact('categories'));
		} 
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

		$rules = [
			'name' => 'required',
			'category_id' => 'required',
			'price' => 'required',
			'description' => 'nullable',
			'image' => 'required_without:hidden_image|image|max:2048',
		];

		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){	
			return response()->json(['error' => $validator->errors()->first()]);
		}

		$data = $request->except('image');

		if($request->hasFile('image')){
			
			$image = $request->file('image');

			$imageName = time() . '.' . $image->getClientOriginalExtension();

			$image->move(public_path('images'),$imageName);

			$data['image'] = $imageName;
		}

        if(empty($request->id)){
            $data['is_active'] = 1;
        }

		$product = Product::updateOrCreate(['id' => $request->id],$data);

		if($request->id) {
			$msg =  'Product Updated';
		}else{
			$msg =  'Product Added';
		}

		return response()->json(['status' => 'success','msg' => $msg]);  
    }

    /**
     * Display the Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
	  	$html = view('products.view',compact('product'))->render();
		return response()->json($html);
    }

    /**
     * Show the form for editing the Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
	  	return response()->json($product);
    }

    /**
     * Update the status of Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::find($request->id)->update(['is_active' => $request->value]);
		return response()->json(['msg' => ($request->value == 1) ? 'Product Activated' : 'Product Inactivated']);  
    }

    /**
     * Remove the Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
		$image = public_path('images').'/'.$product->getRawOriginal('image');
		if(file_exists($image)){
            unlink($image);
        }
		Product::destroy($id);
		return response()->json(['msg' => "Product Deleted"]);
    }
}

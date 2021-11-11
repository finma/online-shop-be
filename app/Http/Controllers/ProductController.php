<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.products.index', [
      'products' => Product::with(['category'])->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.products.create', [
      'categories' => Category::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:products',
      'stock' => 'required',
      'price' => 'required',
      'image' => 'required|image',
      'category_id' => 'required',
      'description' => 'required'
    ]);

    $validatedData['image'] = $request->file('image')->store('product-image');

    // $validatedData['user_id'] = auth()->user()->id;
    // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    Product::create($validatedData);

    return redirect('/products')->with('success', 'New product has been added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    // return $product;
    return view('admin.products.show', [
      'product' => $product
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('admin.products.edit', [
      'product' => $product,
      'categories' => Category::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $rules = [
      'name' => 'required|max:255',
      'stock' => 'required',
      'price' => 'required',
      'image' => 'image',
      'category_id' => 'required',
      'description' => 'required'
    ];

    if ($request->slug != $product->slug) {
      $rules['slug'] = 'required|unique:products';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }

      $validatedData['image'] = $request->file('image')->store('product-image');
    }

    // $validatedData['user_id'] = auth()->user()->id;
    // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    Product::where('id', $product->id)->update($validatedData);

    return redirect('/products')->with('success', 'Product has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    Storage::delete($product->image);
    Product::destroy($product->id);

    return redirect('/products')->with('success', 'Product has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

    return response()->json(['slug' => $slug]);
  }

  // PRODUCT API

  public function indexAPI()
  {
    return response()->json([
      'message' => 'Success get data products!',
      'data' => Product::with(['category'])->latest()->filters(request(['category']))->paginate(12)->withQueryString()
    ]);
  }


  public function detail(Product $product)
  {
    $detailProduct = Product::with('category')->find($product->id);
    return response()->json([
      'message' => 'Success get detail product',
      'data' => $detailProduct
    ]);
  }
}

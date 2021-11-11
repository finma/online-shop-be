<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.categories.index', [
      'categories' => Category::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:categories',
    ]);

    Category::create($validatedData);

    return redirect('/categories')->with('success', 'New category has been added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('admin.categories.edit', [
      'category' => $category
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
    ]);

    if ($request->slug != $category->slug) {
      $rules['slug'] = 'required|unique:categories';
    }

    Category::where('id', $category->id)->update($validatedData);

    return redirect('/categories')->with('success', 'Category has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    Category::destroy($category->id);

    return redirect('/categories')->with('success', 'Category has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

    return response()->json(['slug' => $slug]);
  }

  // API

  public function indexAPI()
  {
    return response()->json([
      'message' => 'Success get categories',
      'data' => Category::all()
    ]);
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Texture;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $textures = Texture::all();
        return view('admin.products.create', compact("brands", "categories", "textures"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name, '-');

        if ($request->hasFile("image_link")) {
            $img_path = Storage::put("uploads", $request->image_link);
            $data["image_link"] = asset("storage/" . $img_path);
        }
        $product = Product::create($data);

            //For many to many
            //Attach Foreign data from another table
            // if ($request->has("namessss")){
            //     $product->funtionsss()->attach($request->namessss);
            // }
        return redirect()->route('admin.products.show', $product->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $textures = Texture::all();
        return view('admin.products.edit', compact("brands", "categories", "product", "textures"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->name, "-");
        if ($request->hasFile("image_link")){
            if ($product->image_link) {
                Storage::delete($product->image_link);
            }
            $img_path = Storage::put("uploads", $request->image_link);
            $data["image_link"] = asset("storage/" . $img_path);
        }
        $product->update($data);
            // MANY TO MANY
            //Attach Foreign data from another table
            // if ($request->has("namesss")){
            //     $product->functionsss()->sync($request->namess);
            // }
            // else {
            //     $product->sync([]);
            // }
        return redirect()->route("admin.products.show",$product->slug)->with("message", "$product->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy(Product $product)
    {
            if ($product->image_link) {
            Storage::delete($product->image_link);
            }
        $product->delete();
        return redirect()->route("admin.products.index")->with("message", "$product->name è stato eliminato con successo");
    }
}

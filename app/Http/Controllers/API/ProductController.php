<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $input = $request->all();

        $product = Product::create($input);

        return $this->sendResponse(new ProductResource($product), 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product       $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product       $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product       $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        $input = $request->all();

        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->quantity = $input['quantity'];
        $product->save();

        return $this->sendResponse(new ProductResource($product), 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product       $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->sendResponse([], 'Product deleted successfully!');
    }
}

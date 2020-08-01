<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\MainController as MainController;
use App\Product;
use App\Sellers;
use Illuminate\Validation\Validator;



class ProductController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $products = Product::all();


        return $this->sendResponse($products->toArray(), 'Products has retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $product = Product::find('product_id', $id);


        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($product->toArray(), 'Product has retrieved successfully.');
    }
    
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productDetails($id)
    {
        $product = Product::where('product_id', $id)->get();

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($product->toArray(), 'Product has retrieved successfully.');
    }
    
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productListBySeller($id)
    {
        $product = Product::select('sellers_products.*','products.*')
                ->leftJoin('sellers_products','products.product_id','=','sellers_products.product_id')
                ->leftJoin('sellers','sellers_products.seller_id','=','sellers.seller_id')
                ->where('sellers.seller_id',$id)
                ->get();

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($product->toArray(), 'Product has retrieved successfully.');
    }
    
    
      /**
     * Get seller details for a product
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
      public function sellerDetailsByProduct($id)
    {
        $product = Product::select('sellers.*')
                ->leftJoin('sellers_products','products.product_id','=','sellers_products.product_id')
                ->leftJoin('sellers','sellers_products.seller_id','=','sellers.seller_id')
                ->where('sellers_products.product_id',$id)
                ->get();

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($product->toArray(), 'Product has retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

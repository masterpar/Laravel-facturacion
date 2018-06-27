<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductController extends ApiController
{
 
    public function index()
    {
        $product = Product::all();
        return $this->showAll($product);

    }


    public function show(Product $product)
    {
        return view('Producto.product')->with('product',$product);
       //return $this->showOne($product);
    }

   
}

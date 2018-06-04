<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryController extends ApiController
{
    
    public function index(Product $product)
    {
        $categories = $product->categories;

        return $this->showAll($categories);
    }


 
    public function update(Request $request, Product $product, Category $category)
    {
        //sync: sustituir la colleccion (categoria al producto) 
        // attach: agrega la collecion (otra categoria al producto) - pero agrega  datos iguales
        // syncWithoutDetaching: agrega la collecion (otra categoria al producto) - si es un dato igual no lo toma en cuenta
        $product->categories()->syncWithoutDetaching([$category->id]);

        $pp = new Collection($product->categories);
        return $this->showAll($pp);

    }

   
    public function destroy(Product $product)
    {
        //
    }
}

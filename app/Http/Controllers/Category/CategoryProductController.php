<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class CategoryProductController extends ApiController
{
    
    public function index(Category $category)
    {
       // $products = new Collection($category->with('products')->get());
        $products = $category->products;

        return $this->showAll($products);
    }

}

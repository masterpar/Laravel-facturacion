<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class ProductBuyerController extends ApiController
{
    
    public function index(Product $product)
    {
        $buyers = $product->transactions()
        ->with('buyer')
        ->get()
        ->pluck('buyer')
        ->unique('id')
        ->values();

        $buy = new Collection($buyers);

        return $this->showAll($buy);
    }

}

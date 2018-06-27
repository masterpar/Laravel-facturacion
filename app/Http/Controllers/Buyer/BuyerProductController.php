<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class BuyerProductController extends ApiController
{
    public function index(Buyer $buyer)
    {
       //$producto = $buyer->transactions()->with('products')->get()->pluck('products');
      $producto = $buyer->transactions()->get()->pluck('products');
      $product = new Collection ($producto);

       return $this->showAll($product);
    }



   
}

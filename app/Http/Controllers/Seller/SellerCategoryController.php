<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class SellerCategoryController extends ApiController
{
    
    public function index(Seller $seller)
    {
          $categories = $seller->products()
        ->with('categories')
        ->get()
        ->pluck('categories')
        ->collapse()
        ->unique('id')
        ->values();

        $cat = new Collection($categories);

        return $this->showAll($cat);
        
    }

}

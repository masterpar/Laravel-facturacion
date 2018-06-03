<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class BuyerSellerController extends ApiController
{
    
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()
        ->with('products.seller') // llama la relación transaction->product->seller
        ->get()
        ->pluck('products.seller')  
        ->unique('id')  //verifica que no hallan usuarios con el mismo id 
        ->values();     // reorganiza losespacios  dentro de la collection - ya que unique elimina los repetidos

        $sell = new Collection($sellers);

        return $this->showAll($sell);
    }

}

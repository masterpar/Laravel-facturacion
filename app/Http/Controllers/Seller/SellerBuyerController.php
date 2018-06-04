<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class SellerBuyerController extends ApiController
{
    
    public function index(Seller $seller)
    {
         $buyers = $seller->products()
        ->whereHas('transactions')
        ->with('transactions.buyer')
        ->get()
        ->pluck('transactions') // elecciona el atributo en la collection en la relación product->transaction
        ->collapse()   // junta todos los arrays o collection en uno solo
        ->pluck('buyer') // selecciona el atributo en la collection en la relación transaction->buyer
        ->unique() //verifica que no hallan usuarios con el mismo id 
        ->values(); // reorganiza losespacios  dentro de la collection - ya que unique elimina los

         $buy = new Collection($buyers);

        return $this->showAll($buy);
    }

   
}

<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class BuyerCategoryController extends ApiController
{
    
    public function index(Buyer $buyer)
    {
        $categories = $buyer->transactions()
        ->with('products.categories') // llama la relación transaction->product->seller
        ->get()
        ->pluck('products.categories')
        ->collapse()  // junta todos los arrays en uno solo
        ->unique('id')  //verifica que no hallan usuarios con el mismo id 
        ->values();     // reorganiza losespacios  dentro de la collection - ya que unique elimina los repetidos
        

        $cate = new Collection($categories);

        return $this->showAll($cate);
    }

}

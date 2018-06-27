<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Buyer\BuyerProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer = Buyer::has('transactions')->paginate(15);
        //$usuarios = User::paginate(15);
        return view('Buyer.buyers')->with('buyers', $buyer);
        //return $this->showAll($buyer); API
    }

    
    public function show(Buyer $buyer)
    {
        $producto = $buyer->transactions()->get()->pluck('products');
        $products = new Collection ($producto);
       // $comprador = Buyer::has('transactions')->findOrFail($id);
         return view('Buyer.buyer', compact('buyer','products'));
       //return $this->showOne($buyer); API
    }
}
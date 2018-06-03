<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer = Buyer::has('transactions')->get();
        return $this->showAll($buyer);
    }

    
    public function show(Buyer $buyer)
    {
       // $comprador = Buyer::has('transactions')->findOrFail($id);
       return $this->showOne($buyer);
    }
}
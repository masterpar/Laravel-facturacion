<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class BuyerTransactioController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions->get()->toJson();
        //return $this->showAll($transactions);
    }

}

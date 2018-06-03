<?php

namespace App\Http\Controllers\Transaction;

use App\Product;
use App\Category;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class TransactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
     
     $categorias = $transaction->products()->with('categories')->get();
        return $this->showAll($categorias);

    }

    
}

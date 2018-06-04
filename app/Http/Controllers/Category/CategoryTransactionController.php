<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class CategoryTransactionController extends ApiController
{
    
    public function index(Category $category)
    {
        $transactions = $category->products()
        ->whereHas('transactions') //verifica que el producto por lo menos tenga una transaccion
        ->with('transactions')
        ->get()
        ->pluck('transactions')
        ->collapse();

        $tran = new Collection($transactions);

        return $this->showAll($tran);
    }

   
}

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
      // $products = Transaction::whereHas('products')->pluck('id');

        //dd($transaction->load('products.categories')->get());
         $product = $transaction->product;

         //$product = Product::find($transaction->product_id)->get();
        // $category = Category::find($product->product_id);
        // dd($transaction->pluck('product_id'));
        return $this->showAll($product);

    }

    
}

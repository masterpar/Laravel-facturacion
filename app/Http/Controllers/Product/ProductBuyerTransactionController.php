<?php

namespace App\Http\Controllers\Product;

use App\User;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class ProductBuyerTransactionController extends ApiController
{
  
    public function store(Request $request, Product $product, User $buyer)
    {
        //la cantidad que ingresa el usuario sea entero y mayor a 1
        $rules=[
            'quantity' => 'required|integer|min:1', 
        ];

        $this->validate($request,$rules); //validación de la petición


        if ($buyer->id == $product->seller->id) {
            return $this->errorResponse('El comprador debe ser diferente del vendedor',409);
        }

        if (!$buyer->esVerificado()) {
            return $this->errorResponse('El comprador debe ser un usuario verificado',409);
        }

        if (!$product->seller->esVerificado()) {
            return $this->errorResponse('El vendedor debe ser un usuario verificado',409);
        }

        if (!$product->seller->esVerificado()) {
            return $this->errorResponse('El vendedor debe ser un usuario verificado',409);
        }

        if ($product->quantity < $request->quantity) {
            return $this->errorResponse('El producto no tiene la cantidad disponible para realizar la transacción',409);
        }

        return DB::transaction(function () use ($request, $product, $buyer){
            $product->quantity -= $request->quantity;
            $product->save();

            $transaction = Transaction::create([

                'quantity' => $request->quantity,
                'buyer_id' => $buyer->id,
                'product_id' => $product->id,
            ]);

            $trans = new Collection($transaction);

            return $this->showAll($trans,201);

        });
    }

    
}

<?php

namespace App;

use App\Transaction;
use App\scope\BuyerScope;

class Buyer extends User
{

	// protected static  function boot()
	// {
	// 	parent::boot();
	// 	static::addGlobalScope(new BuyerScope);
	// }

public function transactions()
{
	return $this->hasMany(Transaction::class);
}

}

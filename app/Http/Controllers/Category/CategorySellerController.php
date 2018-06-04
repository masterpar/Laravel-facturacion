<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
        ->with('seller')
        ->get()
        ->pluck('seller')
        ->unique('id')
        ->values();

        $sell = new Collection($sellers);
        return $this->showAll($sell);

    }

}

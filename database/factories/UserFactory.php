<?php

use App\User;
use App\Seller;
use App\Product;
use App\Category;
use App\Transaction;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarverificationToken(),
        'admin' => $faker->randomElement([User::USUARIO_ADMINISTRADOR , User::USUARIO_REGULAR]),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1,10),
        'status'  =>  $faker->randomElement([Product::PRODUCTO_DISPONIBLE , Product::PRODUCTO_NO_DISPONIBLE]),
        'image' => $faker->randomElement(['produto1.jpg, produto2.jpg, produto3.jpg']),
        'seller_id' => user::all()->random()->id,
    ];
});


$factory->define(App\Transaction::class, function (Faker $faker) {

	$vendedor = Seller::has('products')->get()->random();
	$comprador = User::all()->except($vendedor->id)->random();

    return [
        'quantity' => $faker->numberBetween(1,10),
        'buyer_id' => $comprador->id,
        'product_id' => $vendedor->products->random()->id,
    ];
});

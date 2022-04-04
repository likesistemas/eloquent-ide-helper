<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Like\Database\Eloquent;
use Like\Database\Faker as DatabaseFaker;
use Like\Eloquent\IdeHelper\Tests\Models\Product;
use Like\Eloquent\IdeHelper\Tests\Models\Subcategory;

$factory = Eloquent::factory();

$factory->define(Subcategory::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
	];
});

$factory->define(Product::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'price' => 10,
		'reference' => DatabaseFaker::unique($faker, 'referenciaProduto')->numberBetween(1, 100),
	];
});

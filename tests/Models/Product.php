<?php

namespace Like\Eloquent\IdeHelper\Tests\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Like\Eloquent\IdeHelper\Tests\Models\Product
 *
 * @property integer $id
 * @property integer $subcategory_id
 * @property string $name
 * @property integer|null $reference
 * @property float $price
 * @property-read \Like\Eloquent\IdeHelper\Tests\Models\Subcategory $subcategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Product whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Product whereSubcategoryId($value)
 */
class Product extends Model {
	protected $fillable = [];

	public function subcategory() {
		return $this->belongsTo(Subcategory::class);
	}
}

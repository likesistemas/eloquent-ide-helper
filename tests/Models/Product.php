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
 * @property string $price
 * @property-read \Like\Eloquent\IdeHelper\Tests\Models\Subcategory $subcategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubcategoryId($value)
 */
class Product extends Model {
	protected $fillable = [];

	public function subcategory() {
		return $this->belongsTo(Subcategory::class);
	}
}

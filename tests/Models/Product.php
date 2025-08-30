<?php

namespace Like\Eloquent\IdeHelper\Tests\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Like\Eloquent\IdeHelper\Tests\Models\Product
 *
 * @property integer $id
 * @property integer $subcategory_id
 * @property string $name
 * @property integer|null $reference
 * @property string $price
 * @property-read Subcategory $subcategory
 *
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereReference($value)
 * @method static Builder|Product whereSubcategoryId($value)
 */
class Product extends Model {
	protected $fillable = [];

	public function subcategory() {
		return $this->belongsTo(Subcategory::class);
	}
}

<?php

namespace Like\Eloquent\IdeHelper\Tests\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Like\Eloquent\IdeHelper\Tests\Models\Subcategory
 *
 * @property integer $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Like\Eloquent\IdeHelper\Tests\Models\Subcategory whereName($value)
 * @mixin \Eloquent
 */
class Subcategory extends Model {
	protected $fillable = [];
}

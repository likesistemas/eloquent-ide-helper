<?php

namespace Like\Eloquent\IdeHelper\Tests\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Like\Eloquent\IdeHelper\Tests\Models\Subcategory
 *
 * @property integer $id
 * @property string $name
 * @method static Builder|Subcategory newModelQuery()
 * @method static Builder|Subcategory newQuery()
 * @method static Builder|Subcategory query()
 * @method static Builder|Subcategory whereId($value)
 * @method static Builder|Subcategory whereName($value)
 * @mixin \Eloquent
 */
class Subcategory extends Model {
	protected $fillable = [];
}

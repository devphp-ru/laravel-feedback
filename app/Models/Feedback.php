<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * @package App\Models
 * @mixin Builder
 */
class Feedback extends Model
{
    use HasFactory;

	/**
	 * @var string[]
	 */
    protected $fillable = [
    	'name',
		'number',
		'comment',
	];

	/**
	 * @param string|null $name
	 * @return Feedback
	 */
    public function setConnection($name)
	{
		return parent::setConnection($name);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'news'  => News::class,
]);

class Tag extends Model {

	use SoftDeletes;

	public $type = 'tags';

	protected $fillable = [
		'title',
		'slug',
		'content_id',
		'content_type'
	];

	protected $dates = ['deleted_at'];

	// RELATIONS
	public function getNews() {
		return $this->morphedByMany( News::class,'taggable');
	}

}

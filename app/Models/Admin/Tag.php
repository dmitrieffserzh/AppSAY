<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'news'  => News::class,
]);

class Tag extends Model {

	//use SoftDeletes;

	public $type = 'tags';

	protected $fillable = [
		'title',
		'slug'
	];

	public $timestamps = false;

	// RELATIONS
	public function getNews() {
		return $this->morphedByMany( News::class,'taggable');
	}

}

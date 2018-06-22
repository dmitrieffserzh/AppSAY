<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $dateFormat = 'U';

	public $fillable = [
		'parent_id',
		'title',
		'slug',
		'color',
		'created_at',
		'updated_at'
	];

	public $dates = [
		'created_at',
		'updated_at'
	];


	public function getRouteKeyName() {
		return 'slug';
	}


	// RELATIONS
	public function getNews() {
		return $this->hasMany(News::class, 'category_id');
	}

	public function children() {
		return $this->hasMany(self::class, 'parent_id');
	}
}

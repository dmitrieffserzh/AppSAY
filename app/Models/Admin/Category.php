<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public $fillable = [
		'parent_id',
		'title',
		'slug',
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

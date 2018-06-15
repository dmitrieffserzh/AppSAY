<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	public $type = 'news';

	public $fillable = [
		'title',
		'content',
		'user_id',
		'category_id',
		'published',
		'created_at',
		'updated_at'
	];

	public $dates = [
		'created_at',
		'updated_at'
	];


	// RELATIONS
	public function getAuthor() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function getCategory() {
		return $this->belongsTo(Category::class, 'category_id');
	}

	public function getTags() {
		return $this->morphToMany(Tag::class, 'taggable');
	}
}

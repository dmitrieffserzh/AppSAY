<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model {

	public $type = 'news';

	public $fillable = [
		'slug',
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

	public function getRouteKeyName() {
		return 'slug';
	}

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

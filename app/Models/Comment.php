<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
	'news'  => News::class,
]);

class Comment extends Model {

	use SoftDeletes;

	public $type = 'comment';

	protected $appends = ['liked'];

	protected $fillable = [
		'user_id',
		'parent_id',
		'content',
		'content_id',
		'content_type'
	];

	protected $dates = ['deleted_at'];


	// RELATIONS
	public function contentTypes() {
		return $this->morphedTo();
	}

	public function like() {
		return $this->morphMany(Like::class, 'content');
	}

	public function getLikedAttribute() {
		$like = $this->like()->where('user_id', Auth::id())->first();
		return !is_null($like);
	}

	public function author() {
		return $this->belongsTo(User::class, 'user_id','id');
	}

	public function replies() {
		return $this->hasMany(Comment::class,'id','parent_id');
	}

	public function children() {
		return $this->hasMany(Comment::class,'parent_id');
	}
}
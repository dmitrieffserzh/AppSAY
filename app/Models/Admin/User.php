<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model {

	use Notifiable;
	use SoftDeletes;

	protected $fillable = [
		'nickname', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];


	// RELATIONS
	public function getProfile() {
		return $this->hasOne( Profile::class );
	}

	public function getNews() {
		return $this->hasMany( News::class );
	}

}

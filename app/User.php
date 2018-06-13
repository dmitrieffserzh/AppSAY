<?php

namespace App;

use App\Models\Profile;
use App\Models\News;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

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

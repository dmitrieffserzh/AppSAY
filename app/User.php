<?php

namespace App;

use App\Models\Profile;
use App\Models\News;
use Illuminate\Support\Facades\Cache;
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


	// IS ADMIN
	public function is_admin() {
		if ( $this->role == 'admin' ) {
			return true;
		} else {
			return false;
		}
	}

	public function isOnline() {
		return Cache::has( 'user-is-online-' . $this->id );
	}


	// RELATIONS
	public function liked() {
		return $this->morphedByMany( News::class, 'content_id' )->whereDeletedAt( null );
	}

	public function getProfile() {
		return $this->hasOne( Profile::class );
	}

	public function followers() {
		return $this->belongsToMany( User::class, 'follows', 'user_id', 'follower_id' )->withTimestamps();
	}

	public function followings() {
		return $this->belongsToMany( User::class, 'follows', 'follower_id', 'user_id' )->withTimestamps();
	}

	public function getNews() {
		return $this->hasMany( News::class );
	}
}

<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = ['avatar', 'name', 'surname', 'city', 'phone', 'about_user', 'offline_at'];

	protected $dates =['offline_at'];


	// RELATIONS
	public function user() {
		return $this->belongsTo(User::class);
	}
}
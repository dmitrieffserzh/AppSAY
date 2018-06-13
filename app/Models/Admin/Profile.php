<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	protected $fillable = ['avatar', 'name', 'surname', 'city', 'phone', 'about_user', 'offline_at'];

	protected $dates =['offline_at'];


	// RELATIONS
	public function getUser() {
		return $this->belongsTo(User::class );
	}
}

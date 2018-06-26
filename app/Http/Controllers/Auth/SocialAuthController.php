<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller {

	public function redirectToProvider() {
		return Socialite::driver('facebook')->redirect();
	}

	public function handleProviderCallback() {
		$user = Socialite::driver('facebook')->user();

		// $user->token;
	}
}
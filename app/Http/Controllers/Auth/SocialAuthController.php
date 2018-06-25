<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
	public function redirect($social)
	{
		return Socialite::driver($social)->redirect();
	}

	public function callback(Request $request,SocialAccountService $service, $social)
	{
		if($request->error=='access_denied')
		{
			return redirect('/');
		}
		$user = $service->createOrGetUser(Socialite::driver($social)->user(), $social);

		return dd($user);

		// auth()->login($user);
		\Auth::login($user);
		return redirect('/');
	}
}
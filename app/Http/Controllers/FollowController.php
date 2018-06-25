<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}


	public function follow( Request $request ) {

		if ( $request->ajax() && $request->isMethod( 'POST' ) ) {

			$result = $request->all();
			$user   = User::find( $result['id'] );
			if ( !$user || $user->id == Auth::id() ) {
				return Response()->json( [
					'error' => 'Ошибка!'
				] );
			}


			$follow_true = $user->followers()->find( Auth::id() );

			if ( $follow_true ) {

				$user->followers()->detach( Auth::id() );

				return Response()->json( [
					'success' => false,
					'message' => 'Подписка отменена!'
				] );
			}

			$user->followers()->attach( Auth::id() );

			//return redirect()->back()->with('success', 'Successfully followed the user.');
			return Response()->json( [
				'success' => true,
				'message' => 'Подписка оформлена!'
			] );

		}


//
//		$result = $request->all();
//
//		$follow = User::withTrashed()->followers()->where('user_id', Auth::id())->where('follower_id', $result['id'] )->first();
//
//		if ( is_null( $follow  ) ) {
//
//			$follow               = new Follow();
//			$follow->user_id      = Auth::id();
//			$follow->follower_id   = $result['id'];
//			$follow->save();
//
//		} else {
//			if ( is_null( $follow->deleted_at ) ) {
//				$follow->delete();
//			} else {
//				$follow->restore();
//			}
//		}
//
//		// LIKE COUNTER
//		$followers_count = Follow::all( $result['id'] )->count();
//
//		return Response()->json( [
//			'follow'      => is_null( $follow->deleted_at ),
//			'followers_count' => $followers_count
//		] );

	}


//
//	public function show(int $userId) {
//		$user = User::find($userId);
//		$followers = $user->followers;
//		$followings = $user->followings;
//		return view('user.show', compact('user', 'followers' , 'followings');
//	}
//
//

}

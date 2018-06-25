<?php


namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProfileController extends Controller {

	public function __construct() {
		// $this->middleware('auth');
	}


	// LIST USERS
	public function index() {

		$users = User::latest()->paginate(15);

		return view('users.index', compact('users'));

	}


	// USER PROFILE
	public function profile($id) {
		$user = User::find($id);
		return view('users.profile', compact('user'));
	}


	public function edit($id) {
		$user= User::find($id);
		return view('users.profile_edit',compact('user'));
	}


	public function update(Request $request, $id) {

		$rules = array(
			'name' => 'max:15',
			'surname' => 'max:15',
			//'city' => 'nullable',
			'phone' => 'nullable',
			'about_user' => 'nullable',
		);

		$messages = array(
			'max' => 'Максимум :max символов!',
		);

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		} else {

			if (Auth::id() == $id) {

				// !!!!!!! ХЗ как сохранить через User.php
				// Так не работает
				//User::find($id)->profile()->update($request->all());

				Profile::find($id)->update($request->all());

				return redirect()->route('users.profile', $id)
				                 ->with('success', 'Article updated successfully');
			}
		}
	}


	public function destroy($id) {
		User::find($id)->delete();
		return redirect()->route('users.index')
		                 ->with('success','Article deleted successfully');
	}

}
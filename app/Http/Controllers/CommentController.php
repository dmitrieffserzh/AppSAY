<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function add_comment(Request $request) {
		//if($request->ajax()) {

			$data = $request->all();

			$new_comment = Comment::create([
				'user_id'       => Auth::id(),
				'parent_id'     => $data['item_id'],
				'content_id'    => $data['content_id'],
				'content'       => $data['content'],
				'content_type'  => $data['content-type'],
			]);
//print_r($new_comment);
//			return view('comments.partials.item',['items'=>$new_comment]);
//

			return Response()->json( [
				'success' => true,
				'comment' => $new_comment
			] );
		//}
	}
}

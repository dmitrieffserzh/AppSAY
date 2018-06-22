<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {

	public function index( $slug ) {
		return view( 'news.index', [
			'news' => Tag::where('slug', $slug )->firstOrFail()->getNews()->latest()->paginate(15)
		] );
	}
}

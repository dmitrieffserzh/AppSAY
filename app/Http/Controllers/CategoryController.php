<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function __construct() {
		//$this->middleware('auth');
	}

	public function index( $categoty_slug ) {
		return view( 'news.index', [
			'news' => Category::where('slug', $categoty_slug )->firstOrFail()->getNews()->latest()->paginate(15)
		] );
	}
}

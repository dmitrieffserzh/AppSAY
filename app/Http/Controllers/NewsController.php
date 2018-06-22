<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Event;

class NewsController extends Controller {

	public function index() {
		return view( 'news.index', [
			'news' => News::latest()->paginate( 15 )
		] );
	}


	public function show( $slug ) {

		echo $slug;
	die;
		//$post = News::find( $news_slug );
		//Event::fire( 'main.content.news.view', $post );


//		return 'сработало';
//		return view( 'main.content.news.view', [
//			'post' => $post
//		] );
	}
}
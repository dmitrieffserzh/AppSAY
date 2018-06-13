<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\News;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller {


	public function index() {
		$news = News::latest()->paginate( 5 );

		return view( 'admin.news.index', compact( 'news' ) )
			->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 5 );
	}


	public function create() {
		return view( 'admin.news.create', [
			'category'   => [],
			'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->get(),
			'delimiter'  => '',
			'news'       => NULL
		] );
	}


	public function store( Request $request ) {

		request()->validate( [
			'title'   => 'required',
			'content' => 'required',
		] );

		$news              = new News();
		$news->user_id     = Auth::id();
		$news->title       = $request['title'];
		$news->content     = $request['content'];
		$news->published   = $request['published'];
		$news->category_id = $request['category_id'];
		$news->save();

		return redirect()->route( 'admin.news.index' )
		                 ->with( 'success', 'Новость успешно опубликована!' );
	}


	public function show( $id ) {
		return view( 'admin.news.show', [
			'news' => News::find( $id )
		] );
	}


	public function edit( $id ) {
		return view( 'admin.news.edit',
			[
				'news'       => News::find( $id ),
				'category'   => [],
				'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->get(),
				'delimiter'  => ''
			] );
	}


	public function update( Request $request, $id ) {

		request()->validate([
			'title' => 'required',
			'content' => 'required',

		]);


		News::find( $id )->update( $request->all() );

		return redirect()->route( 'admin.news.index' )
		                 ->with( 'success', 'Article updated successfully' );
	}


	public function destroy( $id ) {
		News::find( $id )->delete();

		return redirect()->route( 'admin.news.index' )
		                 ->with( 'success', 'Article deleted successfully' );
	}
}

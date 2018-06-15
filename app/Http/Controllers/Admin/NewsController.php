<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use App\Models\Admin\Category;
use App\Models\Admin\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class NewsController extends Controller {

	public function index() {
		$news = News::latest()->paginate( 15 );

		return view( 'admin.news.index', compact( 'news' ) )
			->with( 'i', ( request()->input( 'page', 1 ) - 1 ) * 15 );
	}


	public function create() {
		return view( 'admin.news.create', [
			'category'   => [],
			'categories' => Category::with( 'children' )->where( 'parent_id', '0' )->get(),
			'delimiter'  => '',
			'news'       => null
		] );
	}


	public function store( Request $request ) {

		request()->validate( [
			'title'   => 'required',
			'content' => 'required',
			'tags'    => 'required',
		] );

		$tags = $request['tags'];

		$news              = new News();
		$news->user_id     = Auth::id();
		$news->title       = $request['title'];
		$news->content     = $request['content'];
		$news->published   = $request['published'];
		$news->category_id = $request['category_id'];
		$news->save();

		// SAVE TAGS FUNCTION
		$this->saveTags( $news, $tags );

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

		request()->validate( [
			'title'   => 'required',
			'content' => 'required',

		] );


		News::find( $id )->update( $request->all() );

		return redirect()->route( 'admin.news.index' )
		                 ->with( 'success', 'Article updated successfully' );
	}


	public function destroy( $id ) {
		News::find( $id )->delete();

		return redirect()->route( 'admin.news.index' )
		                 ->with( 'success', 'Article deleted successfully' );
	}


	// SAVE TAGS FUNCTIONS
	private function saveTags( $news, $tags ) {

		$array_replace_map = function ( $value ) {
			return mb_strtolower( str_replace( ' ', '_', str_replace( '  ', ' ', trim( $value ) ) ) );
		};

		$tags = trim( preg_replace( '/[^A-Za-zА-Яа-яЁё0-9,\s]+/u', '', $tags ) );
		$tags = array_map( $array_replace_map, array_values( array_diff( explode( ",", $tags ), array( '', ' ' ) ) ) );


		for ( $i = 0; $i < count( $tags ); $i ++ ) {

			$tag_exist = Tag::where( 'title', $tags[ $i ] )->first();

			if ( ! $tag_exist ) {

				$news->getTags()->create( [
					'title' => $tags[ $i ],
					'slug'  => str_slug( $tags[ $i ] ),
				] );
			} else {
				$news->getTags()->attach( $tag_exist );
			}

		}
	}


}

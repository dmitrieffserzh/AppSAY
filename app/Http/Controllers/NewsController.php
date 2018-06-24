<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Event;

class NewsController extends Controller {

    public function index() {
        return view('news.index', [
            'news' => News::latest()->paginate(15)
        ]);
    }


    public function show($category_slug, $slug) {

        $news = News::where('slug', $slug)->firstOrFail();

        if ($news->getCategory->slug != $category_slug) {
            abort(404);
        }

        Event::fire( 'news.show', $news );

        return view('news.show', [
            'news' => $news
        ]);
    }
}
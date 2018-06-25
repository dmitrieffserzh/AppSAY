@push('add_styles')
    <link href="{{ asset('main/css/likes.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/views.css') }}" rel="stylesheet">
@endpush

@extends('app')

@section('content')

    <section class="section">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="col">
            <h1>{{ $news->title }}</h1>
            {!! $news->content !!}
        </div>

        <div class="col">
            @php($count_tags = 1)
            @foreach($news->getTags as $item_tag)

                <a href="{{ route('news.tag', $item_tag->slug) }}" class="text-uppercase text-primary"
                   style="font-size: 10px;">#{{ $item_tag->title }}</a>@if($count_tags != count($news->getTags))<span class="text-primary">, </span>@endif
                @php($count_tags++)

            @endforeach

        </div>
        <div class="col">
            @include('widgets.comments-count.comments_count', ['content'=>$news])
            @include('widgets.views.view_count', ['content'=>$news])
            @include('widgets.likes.like', ['content'=>$news])
        </div>

    </section>

@endsection


@section('aside')
    <h4 class="text-uppercase border-bottom border-gray pb-2 text-primary">Боковая колонка</h4>
    <ul class="aside-menu">
        <li><a href="{{ route('users.list') }}">Пользователи</a></li>
        <li><a href="{{ route('news.index') }}">Новости</a></li>

    @if(Auth::check())
        {{--@if( Auth::user()->role == 'editor' || Auth::user()->is_admin())--}}
        {{--<li><a href="{{ route('admin.dashboard') }}">Панель управления</a></li>--}}
        {{--@endif--}}
    @endif
    <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal"
                   data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
            <li><a href="{{ route('register') }}">Регистрация</a></li>
        @else
            <li>
                {{--<a href="{{ route('users.profile', Auth::id()) }}">--}}
                {{--{{ Auth::user()->nickname }}--}}
                {{--</a>--}}

            </li>

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        @endif
    </ul>
@endsection
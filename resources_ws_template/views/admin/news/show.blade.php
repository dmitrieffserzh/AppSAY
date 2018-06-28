@extends('admin')

@section('content')
    <h2 class="d-inline-block">{{ $news->title }}</h2>
        <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.news.index') }}">
            Отменить
        </a>
    <hr>
    <strong>Категория:</strong> {{ $news->getCategory->title or "Категория не указана" }}
    <div class="row">
        <div class="col-lg-6">
            {{ $news->content }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            @forelse($news->getTags as $item_tag)
                {{ $item_tag->title }},
                @empty
                {{ 'Теги не найдены' }}
            @endforelse
        </div>
    </div>
@endsection
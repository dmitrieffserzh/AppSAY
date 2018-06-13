@extends('admin')

@section('content')
    <h2 class="d-inline-block">{{ $news->title }}</h2>
        <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.news.index') }}">
            Отменить
        </a>
    <hr>
    <strong>Категория:</strong> {{ $news->getCategory->title }}
    <div class="row">
        <div class="col-lg-6">
            {{ $news->content }}
        </div>
    </div>
@endsection
@extends('admin')

@section('content')
    <h2 class="d-inline-block">{{ $category->title }}</h2>
        <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.categories.index') }}">
            Назад
        </a>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="d-block" style="background: {{ $category->color }};height: 30px;width: 30px"></div>

        </div>
    </div>
@endsection
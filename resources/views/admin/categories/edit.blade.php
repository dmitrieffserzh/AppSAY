@extends('admin')

@section('content')
    <h2 class="d-inline-block">Изменить категорию</h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('admin.categories.update', $news->id) }}" method="post">
                @csrf
                {{ method_field('PATCH') }}

                @include('admin.categories.partials.form')

                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </form>
        </div>
    </div>
@endsection
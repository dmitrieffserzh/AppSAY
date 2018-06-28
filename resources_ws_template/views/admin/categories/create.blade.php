@extends('admin')

@section('content')
    <h2 class="d-inline-block">Добавить категорию</h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                @include('admin.categories.partials.form')
                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </form>
        </div>
    </div>
@endsection
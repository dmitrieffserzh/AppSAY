@extends('admin')

@section('content')
    <h2 class="d-inline-block">Изменить новость</h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('admin.news.update', $news->id) }}" method="post">
                @csrf
                {{ method_field('PATCH') }}

                @include('admin.news.partials.form')


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="published" id="publish" value="1"
                           @if($news->published == 1) checked @endif>
                    <label class="form-check-label" for="publish">
                        Опубликовать
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="published" id="none-publish" value="0"
                           @if($news->published == 0) checked @endif>
                    <label class="form-check-label" for="none-publish">
                        Оставить в черновиках
                    </label>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </form>
        </div>
    </div>
@endsection
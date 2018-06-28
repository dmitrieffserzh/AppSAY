@extends('admin')

@section('content')
    <h2 class="d-inline-block">Категории</h2>
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.categories.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-feather feather-plus">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        Добавить категорию
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th width="40px" class="text-center">#</th>
                    <th width="30px" class="text-center"></th>
                    <th>Категория</th>
                    <th>URL</th>
                    <th width="200px" class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                @include('admin.categories.partials.item', $categories )
            </tbody>
        </table>

        {!! $categories->links() !!}
    </div>
@endsection
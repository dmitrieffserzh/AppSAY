@push('custom-scripts')

@endpush
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-8">
                @include('users.partials.edit_form')
            </div>
        </div>
    </div>
@endsection
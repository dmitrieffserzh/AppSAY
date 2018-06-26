<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&amp;subset=cyrillic" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('add_styles')
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('add_scripts')
</head>
<body>
{{-- HEADER --}}
@include('app_header')

<div class="container">
    <div class="row no-gutters bg-white rounded shadow-sm">

        {{-- ONLY MAIN PAGE --}}

        @yield('home_news')

        {{-- END --}}

        <main class="main col-md-9 px-3 py-4 border-right border-gray">
            @yield('content')
        </main>
        <aside class="aside col-md-3 px-3 py-4">
            @yield('aside')
        </aside>
    </div>
</div>

{{-- FOOTER --}}
@include('app_footer')

{{-- MODAL --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document"></div>
</div>
@yield('scripts')
</body>
</html>
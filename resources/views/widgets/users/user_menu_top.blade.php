@push('add_styles')
    <link href="{{ asset('main/css/users.css') }}" rel="stylesheet">
@endpush

<div class="user_wgt d-inline-block float-right">

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
        <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
    </svg>

    <a class="d-inline-block" href="{{ route('users.profile', Auth::id()) }}" id="user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-flip="false">
        <img class="rounded-circle"
             style="width: 40px; height: 40px; border: 2px Solid rgba(255, 255, 255, 0.1);"
             src="{{ getImage('thumbnail', Auth::user()->profile->avatar) }}"
             alt="{{ Auth::user()->nickname }}">
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-dropdown">
        <!--<div class="dropdown-header">{{ Auth::user()->nickname }}</div>-->
        <a class="dropdown-item" href="{{ route('users.profile', Auth::id()) }}">{{ __('Мой профиль') }}</a>
        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Мои подписчики') }}</a>
        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Мои подписки') }}</a>
        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Мои сообщения') }}</a>
        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Мои публикации') }}</a>

        @if(Auth::user()->role == 'editor' || Auth::user()->is_admin())
            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Панель управления') }}</a>
        @endif

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">{{ __('Выйти') }}</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
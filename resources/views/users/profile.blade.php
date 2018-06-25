@push('add_styles')
    {{--<link href="{{ asset('css/components/image-select-area.css') }}" rel="stylesheet">--}}
@endpush

@push('add_scripts')
    <script src="{{ asset('main/js/image_uploader.js') }}" defer></script>
@endpush


@extends('app')
<style>

    .bg-profile {
        /*background: -moz-linear-gradient(45deg, rgba(0, 233, 255, 0.7) 0%, rgba(209, 0, 212, 0.85) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(0, 143, 212, 0.77)), color-stop(100%, rgba(209, 0, 212, 0.85))), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: -webkit-linear-gradient(45deg, rgba(0, 233, 255, 0.7) 0%, rgba(209, 0, 212, 0.85) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: -o-linear-gradient(45deg, rgba(0, 233, 255, 0.7) 0%, rgba(209, 0, 212, 0.85) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: -ms-linear-gradient(45deg, rgba(0, 233, 255, 0.7) 0%, rgba(209, 0, 212, 0.85) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: linear-gradient(45deg, rgba(0, 233, 255, 0.7) 0%, rgba(209, 0, 212, 0.85) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=rgba(0, 233, 255, 0.7), endColorstr=rgba(209, 0, 212, 0.85), GradientType=1);
        */
        background: #ff6062;
        background: -webkit-linear-gradient(right, rgba(17, 10, 52, 0.69) 0%, rgba(28, 19, 46, 0.82) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: -o-linear-gradient(right, rgba(64, 22, 22, 0.69) 0%, rgba(56, 23, 23, 0.82) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        background: linear-gradient(to left, rgba(17, 27, 73, 0.69) 0%, rgba(11, 10, 44, 0.82) 100%), url("{{ getImage('cover', $user->getProfile->avatar) }}") no-repeat center center;
        width: 100%;
        height: auto;
        background-size: cover;
    }
</style>

@section('content')
        <section class="section profile ow-h">
            <div class="profile-header bg-profile pt-5 pb-5 p-md-0">
                <div class="row no-gutters text-center text-md-left">
                    <div class="col-md-auto">
                        <div class="profile-image rounded mt-5 mb-3 m-md-3 ow-h">
                            <img id="image_change" class="rounded" style="width: 150px; height: 150px;"
                                 src="{{ getImage('normal', $user->getProfile->avatar) }}"
                                 alt="{{ $user->nickname }}">
                            @if(Auth::id() == $user->id)
                                @include('users.partials.image_form')
                            @endif
                        </div>
                    </div>

                    <div class="col-md-auto">
                        <h1 class="text-white h5 mt-md-3">
                            {{ $user->nickname }}
                        </h1>
                        @if($user->getProfile->name || $user->getProfile->surname)
                            <span class="d-block text-light  font-weight-light font-monospace">
                                {{ $user->getProfile->name }} {{ $user->getProfile->surname }}
                            </span>
                        @endif

                        @if($user->isOnline())
                            <span class="d-block text-light small  font-weight-light font-monospace">
                                онлайн
                            </span>
                        @else
                            <span class="d-block text-light small  font-weight-light font-monospace">
                                {{ getOnlineTime($user->getProfile->sex, $user->getProfile->offline_at->diffForHumans()) }}
                            </span>
                        @endif

                </div>

                {{----}}
                {{--<div class="media pb-3 px-3 border-bottom border-gray lh-100  bg-profile">--}}
                {{--<span class="d-inline-block position-relative my-5 mx-3">--}}
                {{----}}
                {{--</span>--}}
                {{--<div class="media-body align-self-center">--}}
                {{----}}
                {{--</div>--}}
                {{--</div>--}}



            </div>
            </div>
            <div class="text-center mb-5" style="margin-top: -18px">
                @if(Auth::check() && Auth::id()!= $user->id)
                    <a href="#" class="follow btn btn-primary shadow-lg" data-id="{{ $user->id }}" style="text-transform:lowercase;width: 150px">
                        @if($user->followers()->find( Auth::id() ))
                            Отписаться
                        @else
                            Подписаться
                        @endif
                    </a>
                @endif
            </div>
            <div class="btn-group d-block">
                <div class="btn btn-sm mt-3" style="width: 32%;">
                    <span class="h2" style="color: #fe4c7d;font-weight: 900">{{$user->getNews($user->id)->count() }}</span>
                    <span class="d-block text-muted small text-lowercase">Публикаций</span>
                </div>
                <div class="btn btn-sm mt-3" style="width: 33%;">
                    <span class="h2" style="color: #fe4c7d;font-weight: 900">{{$user->followers($user->id)->count() }}</span>
                    <span class="d-block small text-muted text-lowercase">Подписчиков</span>
                </div>
                <div class="btn btn-sm mt-3" style="width: 33%;">
                    <span class="h2" style="color: #fe4c7d;font-weight: 900">{{$user->followings($user->id)->count() }}</span>
                    <span class="d-block text-muted small text-lowercase">Подписки</span>
                </div>
            </div>
<!--
            <div class="p3">
                <button class="ajax-modal btn btn-outline-info btn-sm m-1" data-modal-size="modal-sm" data-name="Удалить запись" data-url="#" data-content="Тест модального окна и текста в нем!!<a href='#'>ссыль</a>">Маленькое окно</button>
                <a href="#" class="ajax-modal btn btn-outline-primary btn-sm m-1" data-name="Подписаться на пользователя" data-url="#" data-content="Тест модального окна и текста в нем!! ссылочка">Среднее окно</a>
                <button class="ajax-modal btn btn-outline-danger btn-sm m-1" data-modal-size="modal-lg" data-name="Удалить запись" data-url="#" data-content="Тест модального окна и текста в нем!!<a href='#'>ссыль</a>">Большое окно</button>
            </div>

            -->
            <div class="profile-info mt-3 p-3">
                <h2 class="h6 py-2 border-bottom border-gray">Информация</h2>

                <div class="py-1 border-bottom border-gray">фамилия: {{$user->getProfile->surname}}</div>
                <div class="py-1 border-bottom border-gray">Пол: {{ getSex($user->getProfile->sex) }}</div>
                <div class="py-1 border-bottom border-gray">Город: {{$user->getProfile->city}}</div>
                <div class="py-1 border-bottom border-gray">Телефон: {{$user->getProfile->phone}}</div>
                <div class="py-1 border-bottom border-gray">Обомне: {{$user->getProfile->about_user}}</div>

            </div>
        </section>


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>

            <div class="col-md-4">
                <strong>Original Image:</strong>
                <br/>
                <img src="/images/{{ Session::get('image') }}"/>
            </div>
            <div class="col-md-4">
                <strong>Thumbnail Image:</strong>
                <br/>
                <img src="/thumbnails/{{ Session::get('image') }}"/>
            </div>

            @endif


            <?php //print_r($post->owner->name); ?>


            {{--<h4>{{$user->nickname}}</h4>--}}
            {{--@if($user->isOnline())--}}
            {{--<span class="online"></span>--}}
            {{--@else--}}
            {{--<span class="offline"></span>--}}
            {{--{{ getOnlineTime($user->profile->sex, $user->profile->offline_at->diffForHumans()) }}--}}
            {{--@endif--}}

            {{--@if ($user->id == Auth::id())--}}
            {{--<a href="{{ route('users.profile.edit', $user->id) }}" title="Изменить профиль"--}}
            {{--class="pull-right">--}}
            {{--Изменить профиль--}}
            {{--</a>--}}
            {{--@endif--}}


            </section>

@endsection


@section('aside')

        <ul>
            <li><a href="{{ route('users.list') }}">Пользователи</a></li>
            <li><a href="{{ route('news.index') }}">Новости</a></li>

            @if(Auth::check())
                @if( Auth::user()->role == 'editor' || Auth::user()->is_admin())
                    <li><a href="{{ route('admin.dashboard') }}">Панель управления</a></li>
                @endif
            @endif

            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" class="ajax-modal main-menu__link" data-toggle="modal" data-url="{{ route('login') }}" data-name="Войти" data-modal-size="modal-sm">Войти</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @else
                <li>
                    <a href="{{ route('users.profile', Auth::id()) }}">
                        {{ Auth::user()->nickname }}
                    </a>

                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            @endif
        </ul>

@endsection
{{--<script>--}}

{{--var jcrop_api;--}}

{{--jQuery(function ($) {--}}
{{--var width = jQuery('#target').prop('naturalWidth');--}}
{{--var height = jQuery('#target').prop('naturalHeight');--}}

{{--jQuery('#target').Jcrop({--}}
{{--aspectRatio: 1,--}}
{{--onSelect: showPreview,--}}
{{--onChange: showPreview,--}}
{{--//setSelect: [ 100, 100, 200, 200 ],--}}

{{--trueSize: [width, height],--}}
{{--boxWidth: width,--}}
{{--allowResize: true,--}}
{{--minSize: [300, 300]--}}
{{--});--}}


{{--var $preview = $('#preview');--}}
{{--// Our simple event handler, called from onChange and onSelect--}}
{{--// event handlers, as per the Jcrop invocation above--}}
{{--function showPreview(coords) {--}}
{{--if (parseInt(coords.w) > 0) {--}}
{{--var rx = 100 / coords.w;--}}
{{--var ry = 100 / coords.h;--}}

{{--$preview.css({--}}
{{--width: Math.round(rx * 500) + 'px',--}}
{{--height: Math.round(ry * 370) + 'px',--}}
{{--marginLeft: '-' + Math.round(rx * coords.x) + 'px',--}}
{{--marginTop: '-' + Math.round(ry * coords.y) + 'px'--}}
{{--}).show();--}}
{{--}--}}
{{--}--}}

{{--});--}}
{{--</script>--}}
<div class="media align-items-stretch py-3 border-bottom border-gray">
    <span class="d-inline-block position-relative mr-2">
        <img class="rounded-circle" style="width: 58px; height: 58px;" src="{{ getImage('thumbnail', $user->getProfile->avatar) }}" alt="{{ $user->nickname }}">
        @if($user->isOnline())
            <span class="component-status component-status--online m-1"></span>
        @else
            <span class="component-status component-status--offline m-1"></span>
        @endif
    </span>
    <div class="media-body">
        <a class="text-dark font-weight-bold" href="{{ route('users.profile', $user->id) }}" title="{{ $user->nickname }}">
            {{ $user->nickname }}
        </a>

        @if($user->getProfile->name || $user->getProfile->surname)
            <span class="d-block text-secondary small lh-125">{{$user->getProfile->name}} {{$user->getProfile->surname}}</span>
        @endif

        @if($user->isOnline())
            <span class="d-block text-muted small lh-125 font-weight-light font-monospace">
                онлайн
            </span>
        @else
            <span class="d-block text-muted small lh-125 font-weight-light font-monospace">
                {{ getOnlineTime($user->getProfile->sex, $user->getProfile->offline_at->diffForHumans()) }}
            </span>
        @endif
    </div>
    <div class="align-self-center">
    @if(Auth::check() && Auth::id()!= $user->id)
        <a href="#" class="follow btn btn-primary btn-sm" data-id="{{ $user->id }}" style="min-width: 115px;text-transform:lowercase;">
            @if($user->followers()->find( Auth::id() ))
                Отписаться
            @else
                Подписаться
            @endif
        </a>
    @endif
    </div>
</div>
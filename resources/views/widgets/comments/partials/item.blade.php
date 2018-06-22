@foreach($items as $item)
    <div id="comment-{{$item->id}}" class="comment media lh-100">
        <span class="d-inline-block position-relative mr-2">
            <img class="rounded-circle" style="width: 40px; height: 40px;"
                 src="{{ getImage('thumbnail', $item->author->profile->avatar) }}" alt="{{ $item->author->nickname }}">
            @if($item->author->isOnline())
                <span class="component-status component-status--online"></span>
            @else
                <span class="component-status component-status--offline"></span>
            @endif
        </span>
        <div class="media-body">
            <a class="text-dark small font-weight-bold mr-2 lh-100"
               href="{{ route('users.profile', $item->author->id) }}"
               title="{{ $item->author->nickname }}">
                {{ $item->author->nickname }}
            </a>
            <span class="text-muted small font-weight-light font-monospace lh-100">
        {{ $item->created_at->diffForHumans() }}
        </span>
            @if($item->author->profile->name || $item->author->profile->surname)
                <span class="d-block text-secondary small lh-125">{{$item->author->profile->name}} {{$item->author->profile->surname}}</span>
            @endif

            @if($item->deleted_at)
                <div class="alert alert-primary small mt-2 mb-3 p-3 bg-light rounded lh-125">
                    Недавно здесь был отличный комментарий, но его сперли!
                </div>
            @else
                <div class="comment-text text-secondary small mt-2 mb-3 pb-2 border-bottom border-gray rounded lh-125">
                    {!! $item->content !!}

                    <div class="comment-add d-block text-muted font-weight-light font-monospace mt-2">
                        <div class="append-form"></div>
                        <a href="#{{ $item->author->nickname }}" data-user-name="{{ $item->author->nickname }}" data-item-id="{{$item->id}}" data-content-id="{{$post->id}}" data-content-type="story" class="comment-add-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-right"><polyline points="15 10 20 15 15 20"></polyline><path d="M4 4v7a4 4 0 0 0 4 4h12"></path></svg>
                            Ответить</a>

                    </div>

                </div>

                @include('main.components.likes.like', ['content'=>$item])

            @endif
        </div>
    </div>
            @if(isset($comments_list[$item->id]))
                @include('main.components.comments.partials.item',['items'=>$comments_list[$item->id]])
            @endif

@endforeach

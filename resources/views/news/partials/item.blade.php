@php($count = 1)
@forelse ($news as $item)

    <div class="@if( $count == 99 || $count == 99 || $count == 99 ) col-lg-8 @else col-lg-6 @endif">
        <div class="mb-4 bg-white item-test">
            <img src="{{ getImage('news', $item->image) }}" width="100%">
            <div class="p-3
                    @if( $count == 99 || $count == 99 || $count == 99 )
                    position-absolute abs-pos
                    @endif
                    ">
                <a href="{{ route('news.show', ['category_slug'=>$item->getCategory->slug, 'slug'=>$item->slug]) }}"
                   class="h6 d-block text-dark font-weight-bold">{{$item->title or ""}}</a>
                <h6 class="d-inline-block small text-light p-1" style="background: {{ $item->getCategory->color }}"><a
                            href="{{ route('news.category', $item->getCategory->slug ) }}"
                            class="text-light p-1 font-weight-bold text-uppercase">{{ $item->getCategory->title }}</a></h6>

                <a href="{{ route('users.profile', $item->getAuthor->id) }}" class="author-widget d-inline-block text-dark" title="Автор {{ $item->getAuthor->nickname }}">
                    <img src="{{ $item->getAuthor->getProfile->avatar }}" style="height: 23px;width: 23px" class="rounded-circle" alt="{{ $item->getAuthor->nickname }}">
                    {{ $item->getAuthor->nickname }}
                </a>
                <div class="" style="color: #b0bbc5;">{{ $item->created_at->diffForHumans() }}</div>

                <div class="btn-group float-right d-none" role="group">
                    <a class="btn btn-light btn-sm" href="{{ route('admin.news.edit',$item->id) }}">Изм</a>
                    <a href="{{route( 'admin.news.destroy', $item->id)}}" data-method="delete"
                       data-token="{{csrf_token()}}" data-confirm="Вы уверены?" class="btn btn-light btn-sm">Удал</a>
                </div>

                {{--@include('widgets.comments-count.comments_count', ['content'=>$item])--}}
                @include('widgets.views.view_count', ['content'=>$item])
                @include('widgets.likes.like', ['content'=>$item])

                @php($count_tags = 1)
                @foreach($item->getTags as $item_tag)

                    <a href="{{ route('news.tag', $item_tag->slug) }}" class="text-uppercase text-primary"
                       style="font-size: 10px;">#{{ $item_tag->title }}</a>@if($count_tags != count($item->getTags))<span class="text-primary">, </span>@endif
                    @php($count_tags++)

                @endforeach
            </div>
        </div>
    </div>

    @php( $count++ )
@empty
    <div class="col">
        <div class="alert alert-primary" role="alert">
            {{ 'Новости не найдены' }}
        </div>
    </div>
@endforelse
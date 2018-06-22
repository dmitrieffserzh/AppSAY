<div class="comments pt-3">

    <h5>Комментарии <span class="badge badge-secondary">{{$post->comments->count()}}</span></h5>
    @php
        if($post){
            $comments = $post->comments;
            $comments_list = $comments->groupBy('parent_id');
        } else {
            $comments_list = null;
        };
    @endphp
    <div class="list mt-4">

        @forelse($comments_list as $k => $comments)
            @if($k)
                @break
            @endif
            @include('main.components.comments.partials.item',['items'=>$comments])

        @empty

            <div class="alert">
                Нет комментариев! Но ваш может быть первым! :)
            </div>

        @endforelse

        @include('main.components.comments.partials.form_add')

    </div>
</div>
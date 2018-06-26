@push('add_scripts')
    <script src="{{ asset('js/components/comments.js') }}"></script>
    <script src="{{ asset('js/components/jq_hotkeys.js') }}"></script>
    <script src="{{ asset('js/components/wysiwyg.js') }}"></script>
@endpush
<div class="comments pt-3">
    <h5>Комментарии <span class="badge badge-secondary">{{$content->getComments->count()}}</span></h5>
    @php
        if($content){
            $comments = $content->getComments;
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
            @include('comments.partials.item',['items'=>$comments])

        @empty

            <div class="alert alert-primary" role="alert">
                Комментариев пока нет, но Ваш может быть первым! :)
            </div>

        @endforelse

        @include('comments.partials.form_add', $content)

    </div>
</div>
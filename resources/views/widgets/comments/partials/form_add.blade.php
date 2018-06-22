@push('custom-scripts')
    <script src="{{ asset('js/components/comments.js') }}"></script>
    <script src="{{ asset('js/components/jq_hotkeys.js') }}"></script>
    <script src="{{ asset('js/components/wysiwyg.js') }}"></script>
@endpush


<form id="comment-form" class="comment-form">
    {{-- TOOLBAR --}}

    <div class="btn-toolbar comment-form__toolbar" data-role="editor-toolbar" data-target="#comment-editor">

    <div class="btn-group">
    <a class="btn btn-primary" data-edit="bold" title="Выделить жирным (Ctrl/Cmd+B)">
    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bold"><path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path></svg>
    </a>
    <a class="btn btn-primary" data-edit="italic" title="Наклонный (Ctrl/Cmd+I)">
    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-italic"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>

    </a>
    <a class="btn btn-primary" data-edit="underline" title="Подчеркнуть (Ctrl/Cmd+U)">

    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-underline"><path d="M6 3v7a6 6 0 0 0 6 6 6 6 0 0 0 6-6V3"></path><line x1="4" y1="21" x2="20" y2="21"></line></svg>

    </a>
    </div>

    <div class="btn-group dropup" role="group">
    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" title="Вставить ссылку" data-original-title="Hyperlink">
    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>

    </a>
    <div class="dropdown-menu input-append">
    <input class="span2" placeholder="URL" type="text" data-edit="createLink">
    <button class="btn" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
    </div>
    <a class="btn btn-primary" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>
    </div>

    <div class="btn-group">
    <a class="btn btn-primary btn-image" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)">

    <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>

    </a>
    <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 37px; height: 30px;">
    </div>

    </div>

    {{-- TOOLBAR --}}


    <div id="comment-editor" class="comment-form__input"></div>
    <button type="submit" class="comment-form__submit btn btn-primary pull-right">
        Отправить
    </button>
</form>
{{--<div class="editor">--}}
    {{--<div class="btn-toolbar editor_box__toolbar" data-role="editor-toolbar" data-target="#editor">--}}
        {{--<div class="btn-group">--}}
            {{--<a class="btn btn-primary" data-edit="bold" title="Выделить жирным (Ctrl/Cmd+B)">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bold"><path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path><path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path></svg>--}}
            {{--</a>--}}
            {{--<a class="btn btn-primary" data-edit="italic" title="Наклонный (Ctrl/Cmd+I)">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-italic"><line x1="19" y1="4" x2="10" y2="4"></line><line x1="14" y1="20" x2="5" y2="20"></line><line x1="15" y1="4" x2="9" y2="20"></line></svg>--}}

            {{--</a>--}}
            {{--<a class="btn btn-primary" data-edit="underline" title="Подчеркнуть (Ctrl/Cmd+U)">--}}

                {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-underline"><path d="M6 3v7a6 6 0 0 0 6 6 6 6 0 0 0 6-6V3"></path><line x1="4" y1="21" x2="20" y2="21"></line></svg>--}}

            {{--</a>--}}
        {{--</div>--}}

        {{--<div class="btn-group dropup" role="group">--}}
            {{--<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" title="Вставить ссылку" data-original-title="Hyperlink">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>--}}

            {{--</a>--}}
            {{--<div class="dropdown-menu input-append">--}}
                {{--<input class="span2" placeholder="URL" type="text" data-edit="createLink">--}}
                {{--<button class="btn" type="button"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>--}}
            {{--</div>--}}
            {{--<a class="btn btn-primary" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>--}}
        {{--</div>--}}

        {{--<div class="btn-group">--}}
            {{--<a class="btn btn-primary btn-image" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)">--}}

                {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>--}}

            {{--</a>--}}
            {{--<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 37px; height: 30px;">--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div id="comment_form" class="comment_form editor_box__textarea form-control"></div>--}}
    {{--<button type="submit" class="btn btn-primary pull-right">--}}
        {{--<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>--}}
        {{--ответить--}}
    {{--</button>--}}
{{--</div>--}}


@section('scripts')
    <script>
        $(function () {
            $('#comment-editor').wysiwyg();
        });
    </script>
@endsection
<div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $news->title or "" }}">
    <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>


@php
    if(isset($news)) {
        $category_id = $news->category_id;
    } else {
        $category_id = null;
    }
@endphp

<div class="form-group">
    <label for="parent_id">Категория</label>

    <select id="parent_id" class="form-control" name="category_id">
        <option value="0">-- без родительской --</option>
        @include('admin.news.partials.category_list', ['categories' => $categories, 'category_id' => $category_id])
    </select>
</div>

<div class="form-group">
    <textarea name="content" class="form-control" id="" cols="30" rows="10">{{ $news->content or "" }}</textarea>
</div>


<div class="form-group">
    <label for="tags">Теги</label>
    <input type="text" name="tags" class="form-control" id="tags" aria-describedby="tagsHelp"
           value="{{ $news->getTags or "" }}">
    <small id="tagsHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    @if ($errors->has('tags'))
        <span class="text-danger">{{ $errors->first('tags') }}</span>
    @endif
</div>
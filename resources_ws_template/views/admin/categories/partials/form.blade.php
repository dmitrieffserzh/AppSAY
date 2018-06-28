<div class="form-group">
    <label for="title">Заголовок</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $category->title or "" }}">
    <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="form-group">
    <label for="parent_id">URL</label>
    <input type="text" name="slug" class="form-control" id="title" aria-describedby="titleHelp"
           value="{{ $category->slug or "" }}">
</div>

@php
    if(isset($category)) {
        $category_id = $category->id;
    } else {
        $category_id = null;
    }
@endphp

<div class="form-group">
    <label for="parent_id">Родительская категория</label>

    <select id="parent_id" class="form-control" name="parent_id">
        <option value="0">-- без родительской --</option>
        @include('admin.categories.partials.category_list', ['categories' => $categories, 'category_id' => $category_id])
    </select>
</div>

<div class="form-group">
    <label for="parent_id">Цвет бейджа</label>
    <input type="text" name="color" class="form-control" id="title" aria-describedby="titleHelp"
         value="{{ $category->color or "#007bff" }}">
</div>
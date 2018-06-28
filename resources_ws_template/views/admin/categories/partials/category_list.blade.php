@foreach ($categories as $category_list)

    <option value="{{$category_list->id or ""}}"

            @isset($category_id)

                @if ($category_id == $category_list->id)
                    selected="true"
                @endif

            @endisset

    >
        {!! $delimiter or "" !!}{{$category_list->title or ""}}
    </option>

    @if (count($category_list->children) > 0)

        @include('admin.categories.partials.category_list', [
          'categories' => $category_list->children,
          'delimiter'  => '—' . $delimiter . ' ',
          'category_id' => $category_id
        ])

    @endif
@endforeach
@forelse($categories as $item)
    <tr>
        <td class="font-weight-bold text-center">{{ ++$i }}</td>
        <td class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="{{ $item->color }}"
                 stroke="{{ $item->color }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="admin-feather feather-circle">
                <circle cx="12" cy="12" r="10"></circle>
            </svg>
        </td>
        <td><a href="{{ route('admin.categories.show', $item->id) }}">{!! $delimiter or "" !!}{{ $item->title }}</a></td>
        <td>{{ $item->slug }}</td>

        <td class="text-right">
            <div class="btn-group" role="group">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.show', $item->id) }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="admin-feather feather-eye">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>

                </a>
                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $item->id) }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="admin-feather feather-edit">
                        <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                        <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                    </svg>

                </a>
            </div>
            <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" style="display:inline">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="admin-feather feather-trash">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>

                </button>
            </form>

        </td>
    </tr>

    @if(count($item->children) > 0)
        @include('admin.categories.partials.item', [
        'categories' => $item->children,
        'delimiter'  => '—' . $delimiter . ' '
        ] )
    @endif


@empty
    <p class="alert">Нет категорий</p>
@endforelse
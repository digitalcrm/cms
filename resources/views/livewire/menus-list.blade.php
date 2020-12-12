<tbody>
    @forelse($this->menus as $menu)
        <tr>
            <td>
                <a href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}" target="_blank">
                    {{ $menu->name ?? '' }}
                </a>
            </td>

            <td>
                <a href="{{ route('pages.show', $menu->page->slug) }}" target="_blank">
                    {{ $menu->page->title ?? '' }}
                </a>
            </td>

            <td>
                <a wire:click="toggle({{ $menu->id }})" class="btn btn-link">
                    {!! ($menu->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' :
                    '<i class="fas fa-toggle-off fa-2x"></i>' !!}
                </a>
            </td>

            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        data-display="static" aria-haspopup="true" aria-expanded="false">

                    </button>
                    <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                        <a class="dropdown-item" href="{{ route('menus.edit',$menu->id) }}">
                            <i class="far fa-edit"></i> Edit
                        </a>
                        <a class="dropdown-item" href="" type="submit" role="button" onclick="event.preventDefault();
                if(confirm('Are you sure!')){
                    $('#page-delete-{{ $menu->id }}').submit();
                }
                ">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                        <form style="display:none" id="page-delete-{{ $menu->id }}"
                            action="{{ route('menus.destroy',$menu->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="15">
                {{ ("No Data Available") }}
            </td>
        </tr>

    @endforelse
</tbody>


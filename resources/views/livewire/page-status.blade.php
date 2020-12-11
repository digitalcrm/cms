<tbody>
    @forelse($this->pages as $page)
        <tr>
            <td>
                <img src="{{ $page->imageUrl() }}" alt="{{ $page->slug }}" width="75em" height="75em">
                <a href="{{ route('pages.show', $page->slug) }}" target="_blank">
                    {{ $page->title ?? '' }}
                </a>
            </td>

            <td>
                <a wire:click="toggle({{ $page->id }})" class="btn btn-link">
                    {!! ($page->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' :
                    '<i class="fas fa-toggle-off fa-2x"></i>' !!}
                </a>
            </td>

            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        data-display="static" aria-haspopup="true" aria-expanded="false">

                    </button>
                    <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                        <a class="dropdown-item" href="{{ route('pages.edit',$page->slug) }}">
                            <i class="far fa-edit"></i> Edit
                        </a>
                        <a class="dropdown-item" href="" type="submit" role="button" onclick="event.preventDefault();
                if(confirm('Are you sure!')){
                    $('#page-delete-{{ $page->id }}').submit();
                }
                ">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                        <form style="display:none" id="page-delete-{{ $page->id }}"
                            action="{{ route('pages.destroy',$page->slug) }}" method="POST">
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


<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>FileName</th>
            <th>Type</th>
            <th>Total Size</th>
            <th>Widht/Height</th>
            <th>Path</th>
            <th>Uploaded On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($gallaries as $media)
            <tr>
                <td>
                    <img src="{{ $media->imageUrl() }}" alt="{{ $media->file_name }}" style="width: 10rem;
                height: 6rem;
                border-radius: 5px;">
                    {{ $media->name }}
                </td>
                <td>
                    {{ $media->mime_type }}
                </td>
                <td>
                    {{ $media->total_size() }}
                </td>
                <td>
                    {{ $media->image_widht_height() }}
                </td>
                <td>
                    <a href="{{ asset('storage/'.$media->file_photo_url) }}" target="_blank">
                        {{ $media->file_name }}
                    </a>
                </td>
                <td>
                    {{ $media->created_at->toFormattedDateString() }}
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle"
                            data-toggle="dropdown" data-display="static" aria-haspopup="true"
                            aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                            {{-- <a class="dropdown-item"
                                href="{{ route('gallaries.edit',$media->id) }}">
                                <i class="far fa-edit"></i> Edit
                            </a> --}}
                            <a class="dropdown-item" href="" type="submit" role="button"
                                onclick="event.preventDefault();
                            if(confirm('Are you sure!')){
                                $('#form-delete-{{ $media->id }}').submit();
                            }
                            ">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            <form style="display:none" id="form-delete-{{ $media->id }}"
                                action="{{ route('gallaries.destroy',$media->id) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                            </form>

                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="10" align="center">No Data Found</td>
        @endforelse
    </tbody>
</table>
<div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-1 mb-2">
                <select name="postLimit" id="post-limit" class="form-control" wire:model="limit">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
            <div class="col-md-4 float-right">
                <input type="search" class="form-control float-right" placeholder="eg:title" name="post-search"
                    id="post-search" wire:model="searchKeyword">
            </div>
        </div>
        <table id="posttable" class="table table-bordered table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Date</th>
                    {{-- <th>Subcategory</th> --}}
                    {{-- <th>Tags</th> --}}
                    <th>Views</th>
                    <th>Comments</th>
                    <th>Likes</th>
                    <th>Avg Rating</th>
                    <th>Show</th>
                    <th>Active</th>
                    <th>Featured</th>
                    <th>Comment Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allPosts as $post)
                    <tr>
                        <td>
                            {{-- @if($post->featured_image)
                            <img src="{{ $post->featured_image->getUrl('post-thumb') }}"
                            alt="">
                @endif--}}
                <img src="{{ optional($post->featured_image)->getUrl('post-thumb') ?? $post->default_fake_image($post->slug, 35, 35) }}"
                    alt="">

                <a href="{{ route('post.viewitem', $post->slug) }}" target="_blank">
                    {{ $post->title ?? '' }}
                </a>

                </td>
                <td>{{ $post->user->name ?? '' }}</td>
                <td>{{ $post->category->name ?? '' }}</td>

                <td>{{ $post->created_at->toDateString() ?? '' }}</td>

                {{-- <td>{{ $post->subcategory->name ?? 'none' }}</td> --}}
                {{-- <td>
                        {{ $post->posts_having_tags ?? '' }}
                </td> --}}
                <td>
                    {{ $post->postcount }}
                </td>
                <td>
                    {{ $post->total_comments() }}
                </td>
                <td>{{ $post->totalLikes() }}</td>
                <td>{{ $post->averageRating() }}</td>
                <td>
                    @can('view-post')
                        {{-- <small> --}}
                        <a class="dropdown-item" href="{{ route('posts.show',$post->slug) }}">
                            <i class="far fa-eye"></i>
                        </a>
                        {{-- </small> --}}
                    @endcan
                </td>
                <td>
                    <a data-toggle="tooltip" data-placement="top"
                        title="{{ ($post->isactive === 1) ? 'click for inactive the post' : 'click for active the post' }}"
                        class="dropdown-item" href="" type="submit" onclick="event.preventDefault();
                        if(confirm('Are you sure!')){
                            $('#post-status-{{ $post->id }}').submit();
                        }">
                        {!!
                        ($post->isactive == 1) ?
                        '<i class="fas fa-toggle-on" style="color: green"></i>' :
                        '<i class="fas fa-toggle-off" style="color: red"></i>'
                        !!}
                    </a>
                    <form style="display: none" method="post" id="post-status-{{ $post->id }}"
                        action="{{ route('posts.status',$post->slug) }}">
                        @csrf
                        @method('put')
                    </form>
                </td>
                <td>
                    <a data-toggle="tooltip" data-placement="top"
                        title="{{ ($post->featured === 1) ? 'click for disable the featured post' : 'click for active the featured post' }}"
                        class="dropdown-item" href="" type="submit" onclick="event.preventDefault();
                        if(confirm('Are you sure!')){
                            $('#post-featured{{ $post->id }}').submit();
                        }">
                        {!!
                        ($post->featured == 1) ?
                        '<i class="fas fa-toggle-on" style="color: green"></i>' :
                        '<i class="fas fa-toggle-off" style="color: red"></i>'
                        !!}
                    </a>
                    <form style="display: none" method="post" id="post-featured{{ $post->id }}"
                        action="{{ route('posts.featured',$post->slug) }}">
                        @csrf
                        @method('put')
                    </form>
                </td>
                <td>
                    {{ ($post->commentActive === 1) ? 'enabled' : 'disabled' }}
                </td>

                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                            data-display="static" aria-haspopup="true" aria-expanded="false">

                        </button>
                        <div class="dropdown-menu dropdown-menu-sm-left dropdown-menu-lg-right">
                            {{-- edit permission start --}}
                            @can('edit-post')
                                <a class="dropdown-item"
                                    href="{{ route('posts.edit',$post->slug) }}">
                                    <i class="far fa-edit"></i> Edit
                                </a>
                            @endcan
                            {{-- edit permission end --}}
                            @can('delete-post')
                                {{-- <small> --}}
                                <a class="dropdown-item" href="" type="submit" role="button" onclick="event.preventDefault();
                                    if(confirm('Are you sure!')){
                                        $('#form-delete-{{ $post->id }}').submit();
                                    }
                                    ">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                                {{-- </small> --}}
                                <form style="display:none" id="form-delete-{{ $post->id }}"
                                    action="{{ route('posts.destroy',$post->slug) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                </form>

                            @endcan
                        </div>
                    </div>
                </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="15">
                        {{ ("No Posts Available") }}
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>
        <div class="col-md-5 mt-2 float-left">
            {{ __('Results') }} {{ $allPosts->firstItem() }} -
            {{ $allPosts->lastItem() }} {{ __('of') }}
            {{ $allPosts->total() }}
        </div>
        <div class="float-right mt-2">
            {{ $allPosts->links() }}
        </div>
    </div>
</div>

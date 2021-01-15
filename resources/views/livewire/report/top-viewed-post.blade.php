<div class="row" wire:poll>
    {{-- <button wire:click="$emit('postReport')">Click</button> --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <select name="postReport" 
                                id="postReport" 
                                wire:model="selectValue"
                                class="form-control form-control-sm">
                            @foreach($filterArray as $value)
                                <option>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive-md">
                <table class="table table-bordered table-striped table-sm">
                    <caption>Top 10 posts</caption>
                    <thead>
                        <th>No.</th>
                        <th>Post Name</th>
                        <th>Views</th>
                        <th>Likes</th>
                    </thead>
                    <tbody>
                        @forelse($topViewedPost as $post_viewed)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('post.viewitem',$post_viewed->slug) }}"
                                        target="_blank" rel="noopener">
                                        {{ $post_viewed->title }}
                                    </a>
                                </td>
                                <td>{{ $post_viewed->postcount }}</td>
                                <td>{{ $post_viewed->likes_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Post available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h5 class="card-title">Page Views</h5>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive-md">
                <table class="table table-bordered table-striped table-sm">
                    <caption>Top-10 page views</caption>
                    <thead>
                        <th>No.</th>
                        <th>Page Name</th>
                        <th>Views</th>
                    </thead>
                    <tbody>
                        @forelse($topPageViewed as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('pages.show',$page->slug) }}" target="_blank" rel="noopener">
                                    {{ $page->title }}
                                </a>
                            </td>
                            <td>{{ $page->views }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No Page Found</td>
                        </tr>                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

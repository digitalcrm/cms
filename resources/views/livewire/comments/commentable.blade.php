<div>
    <div class="card-body">
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Author: {{ $this->commentAuthor }}</h5>
                        <p><strong>Description: </strong>{{ $this->commentTitle }}</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="reply">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="my-input">Text</label>
                                <textarea wire:model="replyText" name="replyText" class="form-control" id="" cols="30"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="close()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Comments</th>
                    <th>Approved</th>
                    @if(request('action') == '')
                    <th>Reply</th>
                    @endif
                    <th>In response to</th>
                    <th>Posted On</th>
                </tr>
            </thead>
            <tbody>
                @forelse($all_comments as $comment)
                    <tr>
                        <td>
                            <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                            class="img-size-50 img-circle mr-3">
                            {{ $comment->user->name }}
                            <p><strong>{{ $comment->user->email }}</strong>,
                                {{ $comment->ip ?? '' }}</p>
                        </td>
                        <td>{{ $comment->body }}</td>
                        <td>
                            <a wire:click="toggle({{ $comment->id }})" class="btn btn-link">
                                {!! ($comment->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' :
                                '<i class="fas fa-toggle-off fa-2x"></i>' !!}
                            </a>
                        </td>

                        @if(request('action') == '')
                        <td>
                            <button wire:click.prevent="commentId({{ $comment->id }})" type="button"
                                class="btn btn-outline-primary" data-toggle="modal" data-target="#replyModal">
                                Reply 
                            </button> 
                            <a class="float-right" href="{{ route('comments.show', $comment->id) }}">
                                [{{ $comment->replies->count() }}]
                            </a>
                        </td>
                        @endif
                        
                        <td>
                            <a href="{{ route('post.viewitem', $comment->commentable->slug) }}"
                                target="_blank">
                                {{ $comment->commentable->title}}
                            </a>
                        </td>
                        <td>{{ $comment->created_at->toFormattedDateString() }}</td>
                    </tr>
                @empty
                    <td colspan="10" align="center">No Comments Available</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

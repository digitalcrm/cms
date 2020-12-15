<tbody>
    @forelse($all_comments as $comment)
    <tr>
        <td>
            {{ $comment->user->name }}
            <p><strong>{{ $comment->user->email }}</strong>, {{ $comment->ip ?? '' }}</p>
        </td>
        <td>{{ $comment->body }}</td>
        <td>
            <a wire:click="toggle({{ $comment->id }})" class="btn btn-link">
                {!! ($comment->isActive === 1) ? '<i class="fas fa-toggle-on fa-2x"></i>' :
                '<i class="fas fa-toggle-off fa-2x"></i>' !!}
            </a>
        </td>
        <td>
            <a href="{{ route('post.viewitem', $comment->commentable->slug) }}" target="_blank">
                {{ $comment->commentable->title }}
            </a>
        </td>
        <td>{{ $comment->created_at->toFormattedDateString() }}</td>
    </tr>
    @empty
        <td colspan="10" align="center">No Comments Available</td>                                    
    @endforelse
</tbody>
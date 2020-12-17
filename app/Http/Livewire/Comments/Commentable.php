<?php

namespace App\Http\Livewire\Comments;

use App\Comment;
use App\Post;
use Livewire\Component;

class Commentable extends Component
{
    public $all_comments;
    
    public $statusMessage;

    public $removeFlashMessage;

    public $replyText; // textarea
    public $commentTitle; // comment body
    public $commentAuthor; // post Author
    public $comment_id; // comment id
    public $replyId; // post Id

    public function commentId($id)
    {
        $comment = Comment::findOrFail($id); // get comment from comments table

        $this->commentTitle = $comment->comment_description();
        $this->comment_id = $comment->id;
        $this->commentAuthor = $comment->user->name;
        
        $this->replyId = $comment->commentable->id; // get the post id for this individual comments

        // dd($comment->id,$this->replyId);
    }

    public function reply()
    {
        if ($this->replyId) {

            $replies = Post::findOrFail($this->replyId);
            
            $replies->comments()->create([
                'user_id' => auth()->user()->id,
                'body' => $this->replyText,
                'isActive' => true,
                'parent_id' => $this->comment_id,
            ]);

            $this->reset();

            $this->emit('replyModal');

            // return redirect()->route('comments.index',['action'=>'replies']);
            return redirect()->route('comments.index');
        }
    }

    public function close()
    {
        $this->reset();
    }

    public function toggle($id)
    {
        $data = Comment::find($id);

        ($data->isActive === 1) ? $this->isActive = false : $this->isActive = true;
        
        $data->update([
            'isActive' => $this->isActive,
        ]);

        session()->flash('message', 'Row '.$data->id.' Status Updated successfully');
        
        return redirect()->route('comments.index');

    }

    public function render()
    {
        $this->all_comments = Comment::typeFilter(request('action'))->latest()->get();

        return view('livewire.comments.commentable');
    }
}

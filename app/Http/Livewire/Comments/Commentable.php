<?php

namespace App\Http\Livewire\Comments;

use App\Comment;
use Livewire\Component;

class Commentable extends Component
{
    public $all_comments;
    
    public $statusMessage;

    public $removeFlashMessage;

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
        $this->all_comments = Comment::get();

        return view('livewire.comments.commentable');
    }
}

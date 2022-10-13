<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    protected $listeners = ['commentPosted'];

    public $comments , $post;

    public function commentPosted(Comment $comment,Comment $replied_to = null) {

        if(!$replied_to->exists) {
            $this->comments->prepend($comment);
        }
        else {
            $comment->replies->prepend($replied_to);
        }
        session()->flash('message', [
            'message' => 'Message',
            'type' => 'success',
        ]);

    }

    public function deleteComment(Comment $comment) {
        if ($comment->user_id === auth()->id()) {
            $comment->delete();
            if ($comment->parent_id) {
                $this->comments = $this->comments->fresh('replies');
            } else {
                $this->comments = $this->comments->except($comment->id);
            }
        }
    }

    public function render()
    {
        return view('livewire.comments');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Comment;
use Livewire\Component;

class CommentField extends Component
{

    protected $listeners = ['addReply'];

    public $post , $comment;
    public $replied_to , $reply_mode = false;

    public function addReply(Comment $comment) {
        $this->reply_mode = true;
        $this->replied_to = $comment;
    }

    public function cancelReply() {
        $this->reply_mode = false;
        $this->replied_to = null;
    }

    public function postComment() {

        $this->validate([
            'comment' => 'required|string|max:256',
        ]);

        $comment = Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post->id,
            'user_id' => auth()->id(),
        ]);
        $comment->load('user');

        if($this->reply_mode) {
            $comment->update(['parent_id' => $this->replied_to->id]);
            $this->emit('commentPosted',$comment->id,$this->replied_to->id);
        }
        else {
            $this->emit('commentPosted',$comment->id);
        }

        $this->cancelReply();

        $this->comment = null;

        session()->flash('message', 'Post successfully updated.');

    }

    public function mount($post) {
        $this->post = $post;
    }


    public function render()
    {
        return view('livewire.comment-field');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function postComment(Post $post,  Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:256',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->withFragment('#add-comment');
        }

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        return back()->withFragment('#add-comment')->with('message', [
            'message' => 'Comment published',
            'type' => 'success',
        ]);
    }

    public function deleteComment(Comment $comment) {

        abort_if($comment->user_id !== Auth::id(),403);

        $comment->delete();

        return back()->withFragment('#add-comment')->with('message', [
            'message' => 'Comment deleted',
            'type' => 'success',
        ]);
    }
}

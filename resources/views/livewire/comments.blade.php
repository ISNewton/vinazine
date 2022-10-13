<div>
    <h3 class="comments-counter">{{$comments->count()}} {{ $comments->count() != 1 ? 'Comments' : 'Comment' }}</h3>
    @foreach ($comments as $comment)
    <li>
        <div class="comment">
            <img class="comment-avatar float-left" alt=""
                src="{{ asset($comment->user->avatar) }}">
            <div class="comment-body">
                <div class="meta-data">
                    @if ($comment->user_id == auth()->id())
                        <span class="float-right mx-3">
                        <a wire:click="deleteComment({{$comment->id}})" class="text-light bg-danger p-2 " type="submit"
                            class="comment-reply" style="cursor: pointer">
                            <i class="fa fa-trash"></i></a>
                        </span>
                    @endif
                    <span style="cursor: pointer" class="float-right pe-auto "><a class="comment-reply" wire:click="$emit('addReply',{{$comment->id}})"><i class="fa fa-mail-reply-all"></i> Reply</a></span>

                    <span class="comment-author"> <a class="text-dark"
                            href="{{ route('author', $comment->user->username) }}">{{ $comment->user->name }}</a></span><span
                        class="comment-date">{{ $comment->created_at }}</span>
                </div>
                <div class="comment-content">
                    <p>{{ $comment->comment }} </p>
                </div>
            </div>
        </div><!-- Comments last end-->

        @if ($comment->replies)
        <ul class="comments-reply">
            @foreach ($comment->replies as $reply)
                <li>
                    <div class="comment">
                        <img class="comment-avatar float-left" alt="" src="{{asset($reply->user->avatar)}}">
                        <div class="comment-body reply-bg">
                            <div class="meta-data">
                                @if ($reply->user_id == auth()->id())
                                <span class="float-right mx-3">
                                    <a wire:click="deleteComment({{$reply->id}})" class="text-light bg-danger p-2 " type="submit"
                                        class="comment-reply" style="cursor: pointer">
                                        <i class="fa fa-trash"></i></a>
                                </span>
                            @endif
                             <span class="comment-author">{{$reply->user->name}}</span><span class="comment-date">{{$reply->created_at}}</span>
                            </div>
                            <div class="comment-content">
                                <p>{{$reply->comment}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Comments end-->
                </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</div>

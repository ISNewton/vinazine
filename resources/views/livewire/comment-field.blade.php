<div>
    <form role="form" class="ts-form" method="POST" wire:submit.prevent="postComment">
        @csrf
        <div class="row">
                <div class="col-md-12">
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                        <div class="form-group">
                            @if ($reply_mode)
                                <div>
                                    <p class="badge badge-danger" style="font-size: 20px">Reply to: {{'@'}}{{$replied_to->user->name}} <span style="cursor: pointer" wire:click="cancelReply" class="ml-2">x</span></p>
                                </div>
                            @endif
                            <textarea wire:model="comment" name="comment" class="form-control msg-box" id="message" placeholder="Your Comment" rows="10" required>
                            </textarea>
                        </div>
                </div>
                <div class="clearfix">
                    <button class="comments-btn btn btn-primary" type="submit">Post Comment</button>
                </div>
                <!-- Col end -->
        </div>
    </form>

    @livewireScripts()
    <script>
        window.Livewire.on('addReply',(id) => {
            const input = document.getElementById('message')
            input.focus()
        })
    </script>
</div>



<div class="card mt-3 ms-{{ $comment->parent_id ? '5' : '0' }}" id="comment-{{ $comment->id }}">
    <div class="card-body">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->comment }}</p>
        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>


        <button class="btn btn-sm btn-link text-primary p-0" onclick="toggleReplyForm({{ $comment->id }})">
            Trả lời
        </button>


        <form action="" method="POST" class="d-none mt-2" id="reply-form-{{ $comment->id }}">
            @csrf
            <div class="mb-2">
                <textarea name="content" class="form-control" rows="2" placeholder="Trả lời..." required></textarea>
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            </div>
            <button class="btn btn-sm btn-secondary">Gửi trả lời</button>
        </form>


        @foreach($comment->replies as $reply)
            @include('Frontend.comment', ['comment' => $reply])
        @endforeach
    </div>
</div>


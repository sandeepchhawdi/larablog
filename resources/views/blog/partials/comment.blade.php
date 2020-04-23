@foreach ($comments as $comment)
<li class="comment">
    <div class="comment-body">
        @if ($comment->is_author)
        <h3>{{ $comment->name }} <span class="author-tag rounded">Author</span></h3>
        @else
        <h3>{{ $comment->name }}</h3>
        @endif
        <div class="meta">{{ date('M d, Y \a\t h:i a', strtotime($comment->created_at)) }}</div>
        <p>{{ $comment->message }}</p>
        <p><a href="#comment-form" data-comment-id='{{ $comment->id }}' class="reply rounded">Reply</a></p>
    </div>

    @if ( $comment->childComments->count() > 0)
    <ul class="children">
        @include('blog.partials.comment', ['comments' => $comment->childComments])
    </ul>
    @endif
</li>
@endforeach
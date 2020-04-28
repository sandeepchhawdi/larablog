<div class="pt-4">
    @if(!session()->has('errors') && !session()->has('success'))
    <div class="text-center">
        <button class="btn btn-primary" id="btn-read-comments">Read Comments</button>
    </div>
    @endif
    <div class="{{ (!session()->has('errors') && !session()->has('success'))? 'hidden' : '' }}" id="read-comments">
        @if($post->comments_count > 0)
        <h3 class="mb-4">{{ ($post->comments_count > 1? $post->comments_count.' Comments' : '1 Comment') }}</h3>
        @endif
        @if ($post->comments->count() > 0)
        <ul class="comment-list">
            @include('blog.partials.comment', ['comments' => $post->parentComments])
        </ul>
        @endif
        <!-- END comment-list -->
        @include('blog.partials.comment_form')
    </div>
</div>
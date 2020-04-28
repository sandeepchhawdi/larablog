<div class="comment-form-wrap" id="comment-form">
    @include('blog.partials.messages')
    <h3>Leave a comment</h3>
    <form action="{{ route('save-comment') }}" method="post" class="p-3 bg-light">
        {!! csrf_field() !!}
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
        <input type="hidden" id="comment-parent-id" name="parent_id" value="0" />
        <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" name="name" placeholder="Please enter your name*" class="form-control" id="name">
            @if ($errors->has('name'))
                <span class="help-block with-errors">
                    <small>
                        <strong>{{ $errors->first('name') }}</strong>
                    </small>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" placeholder="Please enter your email*" class="form-control" id="email">
            @if ($errors->has('email'))
                <span class="help-block with-errors">
                    <small>
                        <strong>{{ $errors->first('email') }}</strong>
                    </small>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" placeholder="Please enter your message*" id="message" cols="30" rows="5" class="form-control"></textarea>
            @if ($errors->has('message'))
                <span class="help-block with-errors">
                    <small>
                        <strong>{{ $errors->first('message') }}</strong>
                    </small>
                </span>
            @endif
        </div>
        <div class="form-group text-right">
            <input type="submit" value="Post Comment" class="btn btn-primary">
        </div>
    </form>
</div>
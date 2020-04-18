@if(!empty($post->parentCategory->first()) && !empty($post->parentCategory->first()->relatedPosts))
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-5">Related Posts</h2>
            </div>
        </div>
        <div class="row">
            @php $relatedPostsCount = 0; @endphp
            @foreach($post->parentCategory->first()->relatedPosts as $relatedPost)
                @if ($relatedPostsCount == 3)
                    @php break; @endphp
                @endif
                @if ($relatedPost->id != $post->id)
                <div class="col-md-6 col-lg-4">
                    <div class="entry2 mb-5">
                        <a href="{{ route('post.detail', $relatedPost->slug) }}"><img src="{{ asset('blog/images/img_1.jpg') }}" alt="Image" class="img-fluid rounded"></a>
                        <span class="post-category text-white bg-primary mb-3">{{ $relatedPost->parentCategory->first()->name }}</span>
                        <h2><a href="{{ route('post.detail', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <span class="d-inline-block mt-1">By <a href="#">{{ $relatedPost->author }}</a></span>
                            <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($relatedPost->published_at)) }}</span>
                        </div>
                        <p>{{ $relatedPost->subtitle }}</p>
                    </div>
                </div>
                @php $relatedPostsCount++; @endphp
                @endif
            @endforeach
        </div>
    </div>
</section>
@endif
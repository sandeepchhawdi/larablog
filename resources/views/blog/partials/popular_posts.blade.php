<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 section-heading"><h2>Popular Posts</h2></div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="entry2">
                    <a href="single.html"><img src="{{ $popular_posts[0]->post_image }}" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-success mb-3">{{ $popular_posts[0]->parentCategory->first()->name }}</span>
                    <h2><a href="single.html">{{ $popular_posts[0]->title }}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <span class="d-inline-block mt-1">By <a href="#">{{ $popular_posts[0]->author }}</a></span>
                        <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($popular_posts[0]->published_at)) }}</span>
                    </div>
                    <p>{{ $popular_posts[0]->subtitle }}</p>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-4">
                @for ($i = 1; $i < 4; $i++)
                    <div class="entry3 d-block d-sm-flex">
                        <figure class="figure order-2"><a href="single.html"><img src="{{ $popular_posts[$i]->post_image }}" alt="Image" class="img-fluid rounded"></a></figure>
                        <div class="text mr-4 order-1">
                            <span class="post-category text-white bg-success mb-3">{{ $popular_posts[$i]->parentCategory->first()->name }}</span>
                            <h2><a href="single.html">{{ $popular_posts[$i]->title }}</a></h2>
                            <span class="post-meta mb-3 d-block">{{ date('M d, Y', strtotime($popular_posts[$i]->published_at)) }}</span>
                            <p>{{ $popular_posts[$i]->subtitle }}</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
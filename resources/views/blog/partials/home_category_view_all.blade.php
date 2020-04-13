<div class="site-section">
    <div class="container">
        <div class="row">
            @for($j = 0; $j < 3; $j++)
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="section-heading mb-5 d-flex align-items-center">
                        <h2>Sports</h2>
                        <div class="ml-auto"><a href="#" class="view-all-btn">View All</a></div>
                    </div>
                    <div class="entry2 mb-5">
                        <a href="single.html"><img src="{{ $posts[0]->post_image }}" alt="Image" class="img-fluid rounded"></a>
                        <span class="post-category text-white bg-primary mb-3">Sports</span>
                        <h2><a href="single.html">{{ $posts[0]->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <span class="d-inline-block mt-1">By <a href="#">{{ $posts[0]->author }}</a></span>
                            <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($posts[0]->published_at)) }}</span>
                        </div>
                        <p>{{ $posts[0]->subtitle }}</p>
                    </div>

                    @for ($i = 1; $i < 4; $i++)
                        <div class="entry4 d-block d-sm-flex">
                            <figure class="figure order-2"><a href="#"><img src="{{ $posts[$i]->post_image }}" alt="Image" class="img-fluid rounded"></a></figure>
                            <div class="text mr-4 order-1">
                                <span class="post-category text-white bg-primary mb-3">Sports</span>
                                <h2><a href="single.html">{{ $posts[$i]->title }}</a></h2>
                                <span class="post-meta mb-3 d-block">{{ date('M d, Y', strtotime($posts[$i]->published_at)) }}</span>
                            </div>
                        </div>
                    @endfor
                </div>
            @endfor
        </div>
    </div>
</div>
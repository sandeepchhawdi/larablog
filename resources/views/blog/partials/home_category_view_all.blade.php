<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($home_page_categories as $cat)
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="section-heading mb-5 d-flex align-items-center">
                        <h2>{{ $cat->name }}</h2>
                        <div class="ml-auto"><a href="{{ route('category.detail', $cat->slug) }}" class="view-all-btn">View All</a></div>
                    </div>
                    @if (count($cat->homePagePosts) >= 4)
                        <div class="entry2 mb-5">
                            <a href="{{ route('post.detail', $cat->homePagePosts->first()->slug) }}"><img style="width: 100%; height: 208px;" src="{{ $cat->homePagePosts->first()->post_image }}" alt="Image" class="img-fluid rounded"></a>
                            <span class="post-category text-white bg-primary mb-3">{{ $cat->homePagePosts->first()->parentCategory->first()->name }}</span>
                            <h2><a href="{{ route('post.detail', $cat->homePagePosts->first()->slug) }}">{{ $cat->homePagePosts->first()->title }}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <span class="d-inline-block mt-1">By <a href="#">{{ $cat->homePagePosts->first()->author }}</a></span>
                                <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($cat->homePagePosts->first()->published_at)) }}</span>
                            </div>
                            <p>{{ $cat->homePagePosts->first()->subtitle }}</p>
                        </div>
                    
                        @for ($i = 1; $i < 4; $i++)
                            <div class="entry4 d-block d-sm-flex">
                                <figure class="figure order-2"><a href="{{ route('post.detail', $cat->homePagePosts[$i]->slug) }}"><img src="{{ $cat->homePagePosts[$i]->post_image }}" alt="Image" class="img-fluid rounded"></a></figure>
                                <div class="text mr-4 order-1">
                                    <span class="post-category text-white bg-primary mb-3">{{ $cat->homePagePosts[$i]->parentCategory->first()->name }}</span>
                                    <h2><a href="{{ route('post.detail', $cat->homePagePosts[$i]->slug) }}">{{ $cat->homePagePosts[$i]->title }}</a></h2>
                                    <span class="post-meta mb-3 d-block">{{ date('M d, Y', strtotime($cat->homePagePosts[$i]->published_at)) }}</span>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
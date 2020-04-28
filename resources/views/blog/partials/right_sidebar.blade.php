<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap mt-2">
        <form action="{{ route('search.detail') }}" class="search-form" id="search-form">
            <div class="form-group">
                <input type="text" class="form-control" required="true" id="q" placeholder="Type a keyword and hit enter">
                <span id="search-error" style="display: none;" class="help-block with-errors">
                    <small>
                        <strong>The searched term is invalid.</strong>
                    </small>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" id="btn-post-search" value="Search" class="btn btn-primary form-control">
            </div>
        </form>
    </div>
    <!-- END sidebar-box -->
    <!-- <div class="sidebar-box">
        <div class="bio text-center">
            <img src="{{ asset('blog/images/person_2.jpg') }}" alt="Image Placeholder" class="img-fluid mb-5">
            <div class="bio-body">
                <h2>Craig David</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
            </div>
        </div>
    </div> -->  
    <!-- END sidebar-box -->  
    <!-- <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <div class="post-entry-sidebar">
            <ul>
                <li>
                    <a href="">
                        <img src="{{ asset('blog/images/img_1.jpg') }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                            <div class="post-meta">
                                <span class="mr-2">March 15, 2018 </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="{{ asset('blog/images/img_2.jpg') }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                            <div class="post-meta">
                                <span class="mr-2">March 15, 2018 </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="{{ asset('blog/images/img_3.jpg') }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                            <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                            <div class="post-meta">
                                <span class="mr-2">March 15, 2018 </span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>-->  

@if(!empty($top_categories))
    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach ($top_categories as $cat )
                <li><a href="{{ route('category.detail', $cat->slug) }}">{{ $cat->name }} <span>({{ $cat->posts_count }})</span></a></li>
            @endforeach
        </ul>
    </div>
@endif

@if (!empty($top_tags))
    <div class="sidebar-box">
        <h3 class="heading">Tags</h3>
        <ul class="tags">
            @foreach ($top_tags as $tag)
            <li><a href="{{ route('tag.detail', $tag->tag) }}">{{ $tag->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
</div>
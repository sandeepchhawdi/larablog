@extends('layouts.blog')
@section('template_title'){{ trans('larablog.home.title') }}@endsection
@section('template_description'){{ trans('larablog.home.description') }}@endsection
@section('content')
<div class="slide-one-item home-slider owl-carousel">
    @for ($i = 0; $i < 3; $i++)
        <div class="site-cover site-cover-sm same-height overlay" style="background-image: url('{{ $posts[$i]->post_image }}');">
            <div class="container">
                <div class="row same-height align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="post-entry">
                            <span class="post-category text-white bg-success mb-3">Nature</span>
                            <h2 class="mb-4"><a href="{{ route('post.detail', $posts[$i]->slug) }}">{{ $posts[$i]->title }}</a></h2>
                            <div class="post-meta align-items-center text-left">
                                <span class="d-inline-block mt-1">By {{ $posts[$i]->author }}</span>
                                <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($posts[$i]->published_at)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 section-heading"><h2>Latest Posts</h2></div>
        </div>
        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5">
                <a href="{{ route('post.detail', $posts[$i]->slug) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ $posts[6]->post_image }}');">
                    <span class="post-category text-white bg-danger">Travel</span>
                    <div class="text">
                        <h2>{{ $posts[6]->title }}</h2>
                        <span>{{ date('M d, Y', strtotime($posts[6]->published_at)) }}</span>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="{{ route('post.detail', $posts[$i]->slug) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ $posts[7]->post_image }}');">
                    <span class="post-category text-white bg-success">Nature</span>
                    <div class="text text-sm">
                        <h2>{{ $posts[7]->title }}</h2>
                        <span>{{ date('M d, Y', strtotime($posts[7]->published_at)) }}</span>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex">
                    @for ($i = 8; $i < 10; $i++)
                        <a href="{{ route('post.detail', $posts[$i]->slug) }}" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{ $posts[$i]->post_image }}');">
                            <span class="post-category text-white bg-warning">Lifestyle</span>
                            <div class="text text-sm">
                                <h2>{{ $posts[$i]->title }}</h2>
                                <span>{{ date('M d, Y', strtotime($posts[$i]->published_at)) }}</span>
                            </div>
                        </a>
                    @endfor
                </div>  

            </div>
        </div>

    </div>
</div>

@include('blog.partials.popular_posts')
@include('blog.partials.home_category_view_all')
@endsection
@extends('layouts.blog')
@section('template_title'){{ $post->title }}@endsection
@section('template_description'){{ $post->meta_description }}@endsection
@section('template_author'){{ $post->author }}@endsection
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ $post->post_image }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">Nature</span>
                    <h1 class="mb-4"><a href="#">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <span class="d-inline-block mt-1">By {{ $post->author }}</span>
                        <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($post->published_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    {!! $post->content_raw !!}
                </div>
                
                <div class="pt-5">
                    <p>Categories:  @if(!empty($post->categoryLinks())) Tags: {!! join(', ', $post->categoryLinks()) !!} @endif @if(!empty($post->tagLinks())) Tags: {!! join(', ', $post->tagLinks()) !!} @endif</p>
                </div>
                
                @include('blog.partials.post_comments')
                
            </div>
            
            @include('blog.partials.right_sidebar')
            
        </div>
    </div>
</section>

@include('blog.partials.post_detail_related_posts')

@include('blog.partials.subscribe_modal_popup')

@endsection
@extends('layouts.blog')
@section('template_title'){{ $post->title }}@endsection
@section('template_description'){{ $post->meta_description }}@endsection
@section('template_author'){{ $post->author }}@endsection
@section('content')
<section class="site-section py-lg">
    <div class="container">
        {{ Breadcrumbs::render('post', $post) }}
        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
                
                <div class="mb-3">
                    <span class="post-category text-white bg-success">{{ ($post->parentCategory->first())? $post->parentCategory->first()->name : "" }}</span>
                    <h2 style="text-transform: uppercase; font-weight: bold;">{{ $post->title }}</h2>
                    <div class="post-meta align-items-center text-left">
                        <span class="d-inline-block mt-1">by <span style="font-weight: bold">{{ $post->author }}</span></span>
                        <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($post->published_at)) }}</span>
                    </div>
                </div>
                
                <div class="mb-3">
                    <img style="width:100%;" src="{{ $post->post_image }}" />
                </div>

                <div class="post-content-body">
                    {!! $post->content_html !!}
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
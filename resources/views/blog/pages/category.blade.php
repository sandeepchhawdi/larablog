@extends('layouts.blog')
@section('template_title'){{ $title }}@endsection
@section('template_description'){{ $meta_description }}@endsection
@section('content')
@include('blog.partials.pages_header', ['title' => $title, 'image' => $post_image])
<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
                @foreach($posts as $post)
                    <div class="entry2 mb-5">
                        <a href="{{ route('post.detail', $post->slug) }}"><img src="{{ $post->post_image }}" alt="Image" class="img-fluid rounded"></a>
                        <span class="post-category text-white bg-primary mb-3">{{ ($post->parentCategory->first())? $post->parentCategory->first()->name : "" }}</span>
                        <h2><a href="{{ route('post.detail', $post->slug) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <span class="d-inline-block mt-1">By <a href="#">{{ $post->author }}</a></span>
                            <span>&nbsp;-&nbsp; {{ date('M d, Y', strtotime($post->published_at)) }}</span>
                        </div>
                        <p>{{ $post->subtitle }}</p>
                    </div>
                @endforeach                
                
                <div class="row text-center pt-5 border-top">
                    <div class="col-md-12">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            @include('blog.partials.right_sidebar')
        </div>
    </div>
</section>
@endsection
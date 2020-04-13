@extends('layouts.blog')
@section('template_title'){{ $pageTitle }}@endsection
@section('template_description'){{ $pageDesc }}@endsection
@section('content')
@include('blog.partials.pages_header')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('blog/images/img_1.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto">
                <h2>About Us</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.</p>

                <ul class="ul-check list-unstyled success">
                    <li>Onsectetur adipisicing elit</li>
                    <li>Dolorem saepe non eligendi possimus</li>
                    <li>Voluptate odit corrupti vitae</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('blog/images/img_1.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 mr-auto order-md-1">
                <h2>We Love To Explore</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.</p>
                <ul class="ul-check list-unstyled success">
                    <li>Onsectetur adipisicing elit</li>
                    <li>Dolorem saepe non eligendi possimus</li>
                    <li>Voluptate odit corrupti vitae</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-5 text-center">
                <h2>Our Editors</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam atque laborum ex qui recusandae</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{ asset('blog/images/person_1.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3">Kate Hampton</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{ asset('blog/images/person_2.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3">Richard Cook</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 text-center">
                <img src="{{ asset('blog/images/person_3.jpg') }}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="mb-3">Kevin Peters</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>
            </div>
        </div>
    </div>
</div>
@endsection
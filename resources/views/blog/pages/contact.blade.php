@extends('layouts.blog')
@section('template_title'){{ $pageTitle }}@endsection
@section('template_description'){{ $pageDesc }}@endsection
@section('content')
@include('blog.partials.pages_header')
<div class="site-section bg-light">
    <div class="container">
        @include('blog.partials.messages')
        <div class="row">
            <div class="col-md-7 mb-5">
                {!! Form::open(['method' => 'POST', 'route' => 'contactSend',  'class' => 'p-5 bg-white', 'id' => 'contact_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <meta name="_token" content="{!! csrf_token() !!}" />
                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="firstname">First Name</label>
                            {!! Form::text('firstname', null, array('id' => 'firstname', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.firstname'), 'required' => false, 'data-error' => ($errors->has('firstname') ? $errors->first('firstname') : ''))) !!}
                            @if ($errors->has('firstname'))
                                <span class="help-block with-errors">
                                    <small>
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </small>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lastname">Last Name</label>
                            {!! Form::text('lastname', null, array('id' => 'lastname', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.lastname'), 'required' => false, 'data-error' => ($errors->has('lastname') ? $errors->first('lastname') : ''))) !!}
                            @if ($errors->has('lastname'))
                                <span class="help-block with-errors">
                                    <small>
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label> 
                            {!! Form::email('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.email'), 'required' => false, 'data-error' => ($errors->has('email') ? $errors->first('email') : ''))) !!}
                            @if ($errors->has('email'))
                                <span class="help-block with-errors">
                                    <small>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="phone">Phone</label> 
                            {!! Form::tel('phone', null, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.phone'), 'required' => false, 'data-error' => ($errors->has('phone') ? $errors->first('phone') : ''))) !!}
                            @if ($errors->has('phone'))
                                <span class="help-block with-errors">
                                    <small>
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label> 
                            {!! Form::textarea('message', null, array('id' => 'message', 'class' => 'form-control', 'rows' => 4, 'placeholder' => trans('forms.contact.placeholders.message'), 'required' => false, 'data-error' => ($errors->has('message') ? $errors->first('message') : ''))) !!}
                            @if ($errors->has('message'))
                                <span class="help-block with-errors">
                                    <small>
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </small>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            {!! Form::button(trans('forms.contact.buttons.send'), ['class' => 'btn btn-primary py-2 px-4 text-white','type' => 'submit', 'name' => 'action', 'value' => trans('forms.contact.buttons.send')]) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-5">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="#">youremail@domain.com</a></p>
                </div>
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
                    <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.categories.pages.create.title') }}
@endsection

@section('template_description')
    {{ trans('admin.categories.pages.create.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.categories.pages.create.header') }}
@endsection

@push('head')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('forms.create-category.title') !!}
                </h5>
            </div>
            <hr>
            @include('admin.partials.messages')
            {!! Form::open(['method' => 'POST', 'route' => 'storecategory',  'class' => 'create-category-form', 'id' => 'create_category_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
                <div class="card-body">
                    <input type="hidden" name="_method" value="POST">
                    @include('admin.category.partials.category-form')
                </div>
                <hr>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-6 mb-3">
                            <button type="submit" class="btn btn-success btn-md btn-block mt-0">
                                {!! trans('forms.create-category.buttons.add-new') !!}
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    $(function() {
        // Image Uploader
        $('#image_trigger').filemanager('image');
    });
</script>

@endpush

@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.categories.pages.update.title') }}
@endsection

@section('template_description')
    {{ trans('admin.categories.pages.update.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.categories.pages.update.header') }}
@endsection

@push('head')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('forms.update-category.title', ['category' => $slug]) !!}
                </h5>
            </div>
            <hr>
            @include('admin.partials.messages')
            {!! Form::open(['method' => 'PUT', 'route' => ['updatecategory', $id],  'class' => 'update-category-form', 'id' => 'update_category_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
                <div class="card-body">
                    <input type="hidden" name="_method" value="PUT">
                    @include('admin.category.partials.category-form')
                </div>
                <hr>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-6 mb-3">
                            <button type="submit" class="btn btn-success btn-md btn-block mt-0">
                                {!! trans('forms.update-category.buttons.update') !!}
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

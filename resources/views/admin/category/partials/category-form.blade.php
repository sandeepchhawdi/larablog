{!! csrf_field() !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<meta name="_token" content="{!! csrf_token() !!}" />

<div class="row">
    <div class="col-md-8">
        <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
            {!! Form::label('category', trans('forms.create-category.labels.name'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('name', $name, [
                    'id' => 'name',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-category.labels.name')
                ]) !!}
            </div>
            @if ($errors->has('name'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
            {!! Form::label('slug', trans('forms.create-category.labels.slug'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('slug', $slug, [
                    'id' => 'slug',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-category.labels.slug')
                ]) !!}
            </div>
            @if ($errors->has('slug'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                </div>
            @endif
        </div>
        
        <div class="form-group has-feedback row {{ $errors->has('parent_id') ? ' has-error ' : '' }}">
            {!! Form::label('parent_id', trans('forms.create-category.labels.parent_category'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::select('parent_id', [0 => 'Select Parent Category'] + $parent_categories, old('parent_id', $parent_id), [
                    'id' => 'parent_id',
                    'class' => 'form-control'
                ]) !!}
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('mark_as_menu') ? ' has-error ' : '' }}">
            {!! Form::label('mark_as_menu', trans('forms.create-category.labels.mark_as_menu'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="mark_as_menu" id="mark_as_menu" class="form-control">
                    <option @if (old('mark_as_menu', $mark_as_menu) == true) selected @endif value="1">
                        Yes
                    </option>
                    <option @if (old('mark_as_menu', $mark_as_menu) == false) selected @endif value="0">
                        No
                    </option>
                </select>
            </div>
            @if ($errors->has('mark_as_menu'))
                <div class="row">
                    <div class="col-12">
                        <span class="help-block">
                            <strong>{{ $errors->first('mark_as_menu') }}</strong>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="form-group has-feedback row {{ $errors->has('show_on_homepage') ? ' has-error ' : '' }}">
            {!! Form::label('show_on_homepage', trans('forms.create-category.labels.show_on_homepage'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="show_on_homepage" id="show_on_homepage" class="form-control">
                    <option @if (old('show_on_homepage', $show_on_homepage) == true) selected @endif value="1">
                        Yes
                    </option>
                    <option @if (old('show_on_homepage', $show_on_homepage) == false) selected @endif value="0">
                        No
                    </option>
                </select>
            </div>
            @if ($errors->has('show_on_homepage'))
                <div class="row">
                    <div class="col-12">
                        <span class="help-block">
                            <strong>{{ $errors->first('show_on_homepage') }}</strong>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="form-group has-feedback row {{ $errors->has('status') ? ' has-error ' : '' }}">
            {!! Form::label('status', trans('forms.create-category.labels.status'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="status" id="status" class="form-control">
                    <option @if (old('status', $status) == true) selected @endif value="1">
                        Active
                    </option>
                    <option @if (old('status', $status) == false) selected @endif value="0">
                        Inactive
                    </option>
                </select>
            </div>
            @if ($errors->has('status'))
                <div class="row">
                    <div class="col-12">
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    </div>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('meta_description') ? ' has-error ' : '' }}">
            {!! Form::label('meta_description', trans('forms.create-category.labels.meta_description'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::textarea('meta_description', $meta_description, array('id' => 'meta_description', 'class' => 'form-control', 'placeholder' => trans('forms.create-category.labels.meta_description'))) !!}
            </div>
            @if ($errors->has('meta_description'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                </div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group has-feedback row {{ $errors->has('image') ? ' has-error ' : '' }}">
            {!! Form::label('image', trans('forms.create-category.labels.category-image'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mb-1">
                        <img src="{{ post_image($image) }}" id="image_preview" class="img img_responsive" alt="Post Image Thumbnail" draggable="false">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-1">
                        <a id="image_trigger" data-input="image" data-preview="image_preview" class="btn btn-primary text-white btn-block">
                            {!! trans('forms.create-category.buttons.choose-image') !!}
                        </a>
                    </div>
                    <div class="col-12 mt-2 mb-1">
                        <input type="text" id="image" class="form-control" name="image" placeholder="{{ trans('forms.create-category.labels.category-image-url') }}" value="{{ post_image($image) }}">
                    </div>
                </div>
                @if ($errors->has('image'))
                    <div class="row">
                        <div class="col-12">
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

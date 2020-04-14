<div class="modal fade modal-danger" id="modal_delete_category" role="dialog" aria-labelledby="modal_delete_category" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fa fa-question-circle fa-fw mr-1 text-white"></i>
                    {!! trans('admin.modals.delete-category.title') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">
                        {!! trans('admin.modals.delete-category.close') !!}
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {!! trans('admin.modals.delete-category.message') !!}
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method' => 'DELETE', 'route' => ['destroycategory', $categoryId], 'role' => 'form', 'id' => 'delete_category_form', 'name' => 'delete_category_form']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <meta name="_token" content="{!! csrf_token() !!}" />
                    {!! Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i> ' . trans('admin.modals.delete-category.cancel'), array('class' => 'btn btn-outline pull-left btn-light', 'type' => 'button', 'data-dismiss' => 'modal' )) !!}
                    {!! Form::button('<i class="fa fa-fw fa-trash-o" aria-hidden="true"></i> ' . trans('admin.modals.delete-category.confirm'), array('class' => 'btn btn-danger pull-right', 'type' => 'submit', 'id' => 'confirm' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

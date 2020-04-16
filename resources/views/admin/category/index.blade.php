@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.categories.pages.index.title') }}
@endsection

@section('template_description')
    {{ trans('admin.categories.pages.index.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.categories.pages.index.header') }}
@endsection

@push('head')
@endpush

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('createcategory') }}" class="btn btn-sm pull-right" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.category.create') !!}">
                        <i class="nc-icon nc-simple-add" aria-hidden="true"></i>
                        <span class="hidden-xs">
                            {{ trans('admin.buttons.create-category') }}
                        </span>
                    </a>
                    <h4 class="card-title">
                        {{ trans('admin.categories.table.title') }}
                    </h4>
                    <span class="badge badge-pill badge-primary pull-left">
                        {!! trans('admin.categories.pages.index.badge', ['per' => '', 'total' => $categories->count()]) !!}
                    </span>
                </div>

                <hr>
                @include('admin.partials.messages')
                @include('admin.partials.loading-spinner-1')

                <div class="card-body" id="categories_table_card" style="display: none;">
                    <div class="table-responsive">
                        <table id="categories_table" class="table table-sm">
                            <thead class="text-primary">
                                <th>
                                    {{ trans('admin.categories.table.titles.id') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.category') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.name') }}
                                </th>
                                <th class="hidden-md">
                                    {{ trans('admin.categories.table.titles.image') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.used') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.marked_as_menu') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.show_on_omepage') }}
                                </th>
                                <th>
                                    {{ trans('admin.categories.table.titles.parent') }}
                                </th>
                                <th data-sortable="false" class="no-search no-sort">
                                    {{ trans('admin.categories.table.titles.actions') }}
                                </th>
                                <th data-sortable="false" class="no-sort no-search"></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="data-style">
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            <span class="badge badge-light badge-pill">
                                                {!! $category->link() !!}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td class="hidden-md data-style">
                                            <img src="{{ $category->image }}" alt="{{ $category->name }} Image" class="img-thumbnail" draggable="false">
                                        </td>
                                        <td>
                                            <span class="badge badge-secondary badge-pill data-style">
                                                {{ $category->posts()->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light badge-pill">
                                                {{ !empty($category->mark_as_menu)? "Yes" : "No" }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light badge-pill">
                                                {{ !empty($category->show_on_homepage)? "Yes" : "No" }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light badge-pill">
                                                {!! !empty($category->parent_id)? $category->parentCategory->link() : "Yes" !!}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.tag.edit') !!}">
                                                <i class="fa fa-edit fa-fw" aria-hidden="true"></i>
                                                {!! trans('admin.buttons.edit-tag') !!}
                                            </a>
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top" title="{!! trans('tooltips.tag.delete') !!}">
                                                <button type="button" class="btn btn-danger btn-sm btn-block delete-category-trigger" data-toggle="modal" data-target="#modal_delete_category" data-category-id="{{ $category->id }}">
                                                    <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                                                    <span class="hidden-xs hidden-sm hidden-md">
                                                        {{ trans('admin.buttons.delete') }}
                                                    </span>
                                                </button>
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix mb-2"></div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.modals.delete-category-modal-form', ['categoryId' => null])

@endsection

@push('scripts')
    <script>
        $(function() {
            $('#categories_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "order": [[ 0, "desc" ]],
                'aoColumnDefs': [{
                    'bSortable': false,
                    'searchable': false,
                    'aTargets': ['no-search'],
                    'bTargets': ['no-sort']
                }]
            });

            $('.delete-category-trigger').click(function(event) {
                var categoryId = $(this).data("category-id");
                var url = "{{ url('/') }}" + "/admin/categories/" + categoryId;
                $('#modal_delete_category').on('show.bs.modal', function (e) {
                    document.delete_category_form.action = url;
                });
            });

            $('.loading').hide();
            $('#categories_table_card').fadeIn(100);
        });
    </script>
@endpush

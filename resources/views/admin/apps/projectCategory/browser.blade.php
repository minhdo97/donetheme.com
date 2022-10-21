@extends('admin.layouts.contentLayoutMaster')

@section('title', 'Category List')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')

@endsection

@section('content')
    <section class="list-wrapper">
        <div class="card">
            <table class="data-list-table table">
                <thead>
                <tr>
                    <th></th>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>slug</th>
                    <th>Parent</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th class="cell-fit">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection

@section('page-script')
    <script>
        $(function () {
            'use strict';

            let dtModuleTable = $('.data-list-table'),
                statusObj = {
                    1: {title: 'Active', class: 'badge-light-success'},
                    0: {title: 'Inactive', class: 'badge-light-secondary'}
                },
                assetPath = $('body').attr('data-asset-path'),
                moduleUrl = assetPath + 'admin/project-categories',
                moduleAdd = moduleUrl + '/create';

            if (dtModuleTable.length) {
                let dt = dtModuleTable.DataTable({
                    ajax: assetPath + 'admin/api/project-categories', // JSON file to add data
                    columns: [
                        // columns according to JSON
                        {data: ''},
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'slug'},
                        {data: 'parent'},
                        {data: 'created_at'},
                        {data: 'updated_at'},
                        {data: ''}
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0,
                            render: function (data, type, full, meta) {
                                return '';
                            }
                        },
                        {
                            // Actions
                            targets: -1,
                            title: 'Actions',
                            width: '80px',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="d-flex align-items-center col-actions">' +
                                    // '<a class="me-1" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Mail">' +
                                    // feather.icons['send'].toSvg({ class: 'font-medium-2 text-body' }) +
                                    // '</a>' +
                                    '<a class="me-25" href="' +
                                    moduleUrl + '/' + full['id'] +
                                    '" data-bs-toggle="tooltip" data-bs-placement="top" title="View">' +
                                    feather.icons['eye'].toSvg({class: 'font-medium-2 text-body'}) +
                                    '</a>' +
                                    '<div class="dropdown">' +
                                    '<a class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({class: 'font-medium-2 text-body'}) +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-end">' +
                                    '<a href="#" class="dropdown-item">' +
                                    feather.icons['download'].toSvg({class: 'font-small-4 me-50'}) +
                                    'Download</a>' +
                                    '<a href="' +
                                    moduleUrl + '/' + full['id'] + '/edit' +
                                    '" class="dropdown-item">' +
                                    feather.icons['edit'].toSvg({class: 'font-small-4 me-50'}) +
                                    'Edit</a>' +
                                    '<a href="' +
                                    moduleUrl + '/' + full['id'] +
                                    '" class="dropdown-item delete-record">' +
                                    feather.icons['trash'].toSvg({class: 'font-small-4 me-50'}) +
                                    'Delete</a>' +
                                    '<a href="#" class="dropdown-item">' +
                                    feather.icons['copy'].toSvg({class: 'font-small-4 me-50'}) +
                                    'Duplicate</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }
                        }
                    ],
                    order: [[1, 'desc']],
                    dom:
                        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                        '>t' +
                        '<"d-flex justify-content-between mx-2 row mb-1"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: 'Show _MENU_',
                        search: 'Search',
                        searchPlaceholder: 'Search..'
                    },
                    // Buttons with Dropdown
                    buttons: [
                        {
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle me-2',
                            text: feather.icons['external-link'].toSvg({class: 'font-small-4 me-50'}) + 'Export',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: feather.icons['printer'].toSvg({class: 'font-small-4 me-50'}) + 'Print',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'csv',
                                    text: feather.icons['file-text'].toSvg({class: 'font-small-4 me-50'}) + 'Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'excel',
                                    text: feather.icons['file'].toSvg({class: 'font-small-4 me-50'}) + 'Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'pdf',
                                    text: feather.icons['clipboard'].toSvg({class: 'font-small-4 me-50'}) + 'Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'copy',
                                    text: feather.icons['copy'].toSvg({class: 'font-small-4 me-50'}) + 'Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                }
                            ],
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                                $(node).parent().removeClass('btn-group');
                                setTimeout(function () {
                                    $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                                }, 50);
                            }
                        },
                        {
                            text: 'Add New',
                            className: 'add-new btn btn-primary',
                            action: function (e, dt, button, config) {
                                window.location = moduleAdd;
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    // For responsive popup
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return 'Details of ' + data['title'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                    return col.columnIndex !== 6 // ? Do not show row in modal popup if title is blank (for check box)
                                        ? '<tr data-dt-row="' +
                                        col.rowIdx +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                        : '';
                                }).join('');
                                return data ? $('<table class="table"/>').append('<tbody>' + data + '</tbody>') : false;
                            }
                        }
                    },
                    initComplete: function () {
                    }
                });
                $(document).on('click', '.delete-record', function (e) {
                    let self = $(this);
                    e.preventDefault();
                    $.ajax({
                        url: self.attr('href'),
                        type: 'DELETE',
                        data: {},
                        success: function (response) {
                            dt.row(self.parents('tr')).remove().draw();
                        }
                    });
                })
            }
        });
    </script>
@endsection

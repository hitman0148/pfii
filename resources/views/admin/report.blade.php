@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')
@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">PARDSS-FII</h2>
            </div>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="xs-pd-20-10 mb-2">
                <div class="row">
{{--                    <button class="btn btn-info btn-sm mr-1" onclick="getModal()">Import</button>--}}
{{--                    <a href="{{ url('/public/temp/member_temp.csv') }}" class="btn btn-warning btn-sm mr-1" >Template</a>--}}
{{--                    <a href="{{ url('admin/export/member') }}" class="btn btn-danger btn-sm mr-1" >Export</a>--}}
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Accomplishment List</h4>
                </div>

                <div class="pb-20">

                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Site</th>
                            <th>Activity</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- buttons for Export datatable -->
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('resources/assets/admin/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

    <script>

        $('document').ready(function() {

            var table = $('.data-table').DataTable({
                ajax: {
                    url: "{{ url('/api/accomps') }}",
                    dataSrc:'data'
                },
                columns:[
                    {data: 'id'},
                    {data: 'activity_date'},
                    {data: 'site'},
                    {data: 'activity'},
                    {data: 'remarks'},
                    {data: ''},
                ],
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
                'columnDefs': [{
                    'targets': 5,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta){
                        return `<div class="dropdown"><a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i> </a> <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="#" onclick="console.log(${data})"
                            ><i class="dw dw-eye"></i> View</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i class="dw dw-edit2"></i> Edit</a
                            >
                            <a class="dropdown-item" href="#"
                            ><i class="dw dw-delete-3"></i> Delete</a
                            >
                        </div>
                    </div>`;
                    }
                }],
                'order': [[1, 'asc']]
            });
        });

        function getModal(){
            $('#Medium-modal').modal();
        }
    </script>
@endsection

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
                <button class="btn btn-info btn-sm mr-1" onclick="getModal()">Import</button>
                <a href="{{ url('/public/member_temp.csv') }}" class="btn btn-warning btn-sm mr-1" >Template</a>
                <a href="{{ url('admin/export/member') }}" class="btn btn-danger btn-sm mr-1" >Export</a>
            </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Member List</h4>
            </div>

            <div class="pb-20">

                <table class="data-table table stripe hover nowrap">
                    <thead>
                    <tr>
                        <th>
                            <div class="dt-checkbox">
                                <input
                                    type="checkbox"
                                    name="select_all"
                                    value="1"
                                    id="example-select-all"
                                />
                                <span class="dt-checkbox-label"></span>
                            </div>
                        </th>
                        <th>ID No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>MI</th>
                        <th>Birth Day</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Mobile No.</th>
                        <th>Date Expiration.</th>
                        <th>Address</th>
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


<div
    class="modal fade"
    id="Medium-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Large modal
                </h4>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                >
                    ×
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/import/member') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" name="import_file" class="form-control mb-1" required>
                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
                </form>
            </div>

        </div>
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
                    url: "{{ url('/api/members') }}",
                    dataSrc:'data'
                },
                columns:[
                    {data: ''},
                    {data: 'id_no'},
                    {data: 'fname'},
                    {data: 'lname'},
                    {data: 'mi'},
                    {data: 'bday'},
                    {data: 'gender'},
                    {data: 'civil_stat'},
                    {data: 'mobile_no'},
                    {data: 'date_expiration'},
                    {data: 'address'},
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
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function (data, type, full, meta){
                        return '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '"><span class="dt-checkbox-label"></span></div>';
                    }
                }],
                'order': [[1, 'asc']]
            });

            $('#example-select-all').on('click', function(){
                var rows = table.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                console.log(rows);
            });

            $('.data-table tbody').on('change', 'input[type="checkbox"]', function(){
                if(!this.checked){
                    var el = $('#example-select-all').get(0);
                    console.log(el);
                    if(el && el.checked && ('indeterminate' in el)){
                        el.indeterminate = true;
                    }
                }
            });
        });

        function getModal(){
            $('#Medium-modal').modal();
        }
    </script>
@endsection

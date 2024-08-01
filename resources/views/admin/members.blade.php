@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')
@section('content')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">PARDSS-FII</h2>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Member List</h4>
            </div>
            <div class="pb-20">
                <table class="data-table-export table stripe hover nowrap">
                    <thead>
                    <tr>
                        <th>ID No.</th>
                        <th class="table-plus datatable-nosort">Name</th>
                        <th>Position</th>
                        <th>Chapter</th>
                        <th>Expiration Date</th>
                        <th>Status</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="table-plus">Gloria F. Mead</td>
                        <td>25</td>
                        <td>Sagittarius</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602</td>
                        <td>29-03-2018</td>
                        <td>Active</td>
                        <td>
                            <div class="dropdown">
                                <a
                                    class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                >
                                    <i class="dw dw-more"></i>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                >
                                    <a class="dropdown-item" href="#"
                                    ><i class="dw dw-eye"></i> View</a
                                    >
                                    <a class="dropdown-item" href="#"
                                    ><i class="dw dw-edit2"></i> Edit</a
                                    >
                                    <a class="dropdown-item" href="#"
                                    ><i class="dw dw-delete-3"></i> Delete</a
                                    >
                                </div>
                            </div>
                        </td>
                    </tr>


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
            // $('.data-table').DataTable({
            //     scrollCollapse: true,
            //     autoWidth: false,
            //     responsive: true,
            //     columnDefs: [{
            //         targets: "datatable-nosort",
            //         orderable: false,
            //     }],
            //     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //     "language": {
            //         "info": "_START_-_END_ of _TOTAL_ entries",
            //         searchPlaceholder: "Search",
            //         paginate: {
            //             next: '<i class="ion-chevron-right"></i>',
            //             previous: '<i class="ion-chevron-left"></i>'
            //         }
            //     },
            // });


            $.ajax({
                url:"{{ url('/api/members') }}",
                type:'get',
                dataType:'json',
                success:function(data){
                    console.log(data);
                    var outputdata = [];
                    $.each(data, function(ind,res) {

                            outputdata[ind] = [
                                res.id_no,
                                res.fname + ',' + res.lname,
                                res.bday,
                                res.gender,
                                res.civil_stat,
                                res.address,
                                res.mobile_no,
                             ];

                    });
                    setDataInTbl(outputdata)
                }
            })


        });


        function setDataInTbl(data){
            $('.data-table-export').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                data: data,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
                dom: 'Bfrtp',
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });
        }




    </script>
@endsection

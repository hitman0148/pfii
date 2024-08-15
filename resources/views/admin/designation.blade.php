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

            <div class="row clearfix">
                <div class="col-md-4 col-sm-12">
                    <div class="card-box">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Designation Form</h4>
                        </div>
                        <div class="pd-20">
                            <form id="desForm">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="designation"
                                    />
                                    <input type="hidden" name="created_by" value="{{ Auth('admin')->user()->name }}">
                                </div>
                                <button class="btn btn-info btn-sm" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-sm-12">

                <!-- Simple Datatable start -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Designation List</h4>
                    </div>
                    <div class="pb-20">

                        <button class="btn btn-danger btn-sm ml-3 mb-3" id="btnTruncate">Truncate</button>
                        <button class="btn btn-warning btn-sm ml-1 mb-3" id="btnImport">Import</button>
                        <a href="{{ url('/public/temp/desig_temp.csv') }}" class="btn btn-success btn-sm ml-1 mb-3">Template</a>

                        <table class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="table-plus datatable-nosort">Title</th>
{{--                                <th class="datatable-nosort">Action</th>--}}
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
        </div>
    </div>



{{--   import modal start  --}}

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
                    Import Designation
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
                <form action="{{ url('admin/import/desig') }}" enctype="multipart/form-data" method="POST">
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
{{--    <script src="{{ url('resources/assets/admin/vendors/scripts/datatable-setting.js') }}"></script>--}}

    <script src="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script>
        $(document).on('submit','#desForm',function(e){
            e.preventDefault();

            $.ajax({
                url:"{{ url('/api/designation') }}",
                type:'post',
                dataType:'json',
                data: $(this).serialize(),
                success:function(data){
                    console.log(data);
                    if(data.statusCode ==  200) {
                        getData();
                        swalSuccess(data.status);
                        $('#desForm')[0].reset();
                    }
                }
            })
        })

        $(document).ready(function(){
            getData();
        });

        function swalSuccess(msg) {
            swal(
                {
                    title: 'Good job!',
                    text: msg,
                    type: 'success',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    timer: 1500
                }
            )
        }

        function getData(){
            $.ajax({
                url:"{{ url('/api/designations') }}",
                type:"get",
                dataType:'json',
                success:function(data){
                    console.log(data);
                    var outputdata = [];
                    $.each(data, function(ind,res) {

                        outputdata[ind] = [
                            res.id,
                            res.designation,
                            // res.id,
                        ];
                    });
                    setDataInTbl(outputdata)
                }
            })
        }



        function setDataInTbl(data){
            $('.data-table').DataTable({
                destroy: true,
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                data:data,
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
            });
        }

        $('#btnImport').on('click',function(){
            $('#Medium-modal').modal();
        });
    </script>
@endsection

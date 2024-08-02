@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')
@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">PARDSS-FII</h2>
            </div>

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
                                <button class="btn btn-info" type="submit">Submit</button>
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

                        <table class="data-table table stripe hover nowrap">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="table-plus datatable-nosort">Title</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>25</td>
                                <td class="table-plus">Gloria F. Mead</td>
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
                            res.id,
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
    </script>
@endsection

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
                    <div class="col-12">
                    <button class="btn btn-info btn-sm mr-1" onclick="getModal()">Create</button>
{{--                    <button class="btn btn-info btn-sm mr-1" onclick="getModal()">Import</button>--}}
{{--                    <a href="{{ url('/public/temp/member_temp.csv') }}" class="btn btn-warning btn-sm mr-1" >Template</a>--}}
{{--                    <a href="{{ url('admin/export/member') }}" class="btn btn-danger btn-sm mr-1" >Export</a>--}}
                    </div>
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
                        Accompolishment Modal
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

                    <form id="accompForm">
                        <input type="hidden" id="_id" name="id" value="">
                        <input type="hidden" name="created_by" value="{{ Auth('admin')->user()->name }}">
                        <div class="row">

                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input
                                        required
                                        class="form-control form-control-sm"
                                        type="date"
                                        id="_activity_date"
                                        name="activity_date"
                                    />
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input required type="text" name="site" id="_site" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <textarea
                                        required
                                        class=" form-control border-radius-0"
                                        name="activity"
                                        id="_activity"
                                    ></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea
                                        class="form-control form-control-sm"
                                        name="remarks"
                                        id="_remarks"
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Personels</label>
                                    <select
                                        class="selectpicker form-control form-control-sm"
                                        data-size="5"
                                        data-style="btn-outline-secondary"
                                        data-selected-text-format="count"
                                        multiple
                                        id="_personels"
                                        name="personels[]"
                                    >
                                        <optgroup label="STA ANA. Members">
                                            @foreach($members as $row)
                                                <option value="{{ $row->id }}">{{ $row->lname .','.$row->fname }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info" type="submit">Submit</button>

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

    <script src="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>

    <script>

        function getData(){
            $('.data-table').DataTable({
                destroy:true,
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
                'columnDefs': [
                    {
                        'targets': 5,
                        'searchable': false,
                        'orderable': false,
                        'className': 'dt-body-center',
                        'render': function (data, type, full, meta){
                            return `<div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i> </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
<!--                                            <a class="dropdown-item" href="#" onclick="getModal(${full.id})"><i class="dw dw-eye"></i> View</a>-->
                                            <a class="dropdown-item" href="#" onclick="getModal(${full.id})"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#" onclick="deleteBtn(${full.id})"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>`;
                        }
                    },
                ],
                'order': [[1, 'asc']]
            });
        }

        $('document').ready(function() {
            getData();
        });

        function getModal(id){
            $('#Medium-modal').modal();
            $('#_id').val(id);
            if(id != 0){
                $.ajax({
                    url: "{{ url('api/accomp') }}/" + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)
                        $('#_activity_date').val(data[0].activity_date);
                        $('#_site').val(data[0].site);
                        $('#_activity').val(removeHtmlTags(data[0].activity));
                        $('#_remarks').val(data[0].remarks);
                        $('#_personels').val([2, 3]);
                    }
                })
            }else{
                $('#accompForm')[0].reset();
            }
        }

        function removeHtmlTags(input) {
            return input.replace(/<[^>]*>/g, '');
        }



        $(document).on('submit','#accompForm',function(e){
            e.preventDefault();
            var datas = $(this).serialize();
            var url= ($('#_id').val() == 0) ? "{{ url('/api/accomp') }}" : "{{ url('/api/accomp-mod') }}";

            $.ajax({
                url: url,
                type:"post",
                dataType:'json',
                data:datas,
                success:function(data){
                    console.log(data)
                    if(data.statusCode == 200){
                        swalSuccess(data.status);
                        $('#accompForm')[0].reset();
                    }
                    $('#Medium-modal').modal('hide');
                    $('.data-table').DataTable().ajax.reload();
                }
            })
        })


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

        function deleteBtn(id){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url: "{{ url('/api/accomp-rem') }}/"+id,
                    type:'post',
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('.data-table').DataTable().ajax.reload();
                    }
                })
            })
        }


    </script>
@endsection

@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')
@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">PARDSS-FII</h2>
            </div>
            <!-- Simple Datatable start -->
            <div class="pd-20 card-box mb-30">
                <div>
                    <h4 class="text-blue h4">Registration Form</h4>
                </div>
                <div class="pb-20">
                    <form id="memberForm" >
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ID No.</label>
                                    <input
                                        name="id_no"
                                        class="form-control"
                                        type="text"
                                        placeholder="SATC-00"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Expiration</label>
                                    <input
                                        class="form-control"
                                        type="date"
                                        name="date_expiration"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="mobile_no"
                                        required
                                    />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Juan"
                                        name="fname"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Mariano"
                                        name="mi"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Dela Cruz"
                                        name="lname"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input
                                        class="form-control"
                                        type="date"
                                        name="bday"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="" class="form-control" required>
                                        <option value="">Select Gender ..</option>
                                        <option>MALE</option>
                                        <option>FEMALE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <select name="civil_stat" id="" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option>SINGLE</option>
                                        <option>MARRIED</option>
                                        <option>SEPARATED</option>
                                        <option>DIVORCED</option>
                                        <option>WIDOWED</option>
                                        <option>OTHERS</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea
                                        required
                                        name="address"
                                        class="form-control"
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info" type="submit">Submit</button>

                    </form>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>

@endsection

@section('links')
    <link
        rel="stylesheet"
        type="text/css"
        href="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweetalert2.css') }}"
    />
@endsection

@section('scripts')

    <!-- add sweet alert js & css in footer -->
    <script src="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
{{--    <script src="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>--}}
    <script>

        $(document).on('submit','#memberForm',function(e){
            e.preventDefault();
            var resp = $(this).serialize();
            $.ajax({
                url:"{{ url('api/member') }}",
                type:'post',
                dataType:'json',
                data:resp,
                success:function(data){
                    console.log(data);
                    if(data.statusCode == 200){
                        $('#memberForm')[0].reset();
                        swalSuccess(data.status);
                    }else{
                        swalError();
                    }
                },error:function(err){
                    console.log(err)
                    swalError();
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

        function swalError(){
            swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
        }

        function swalConfirm(){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            })
        }
    </script>
@endsection


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
                    <h4 class="text-blue h4">Accomplishment Form</h4>
                </div>
                <div class="pb-20">
                    <form id="accompForm">
                        <input type="hidden" name="created_by" value="{{ Auth('admin')->user()->name }}">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input
                                        required
                                        class="form-control form-control-sm"
                                        type="date"
                                        name="activity_date"
                                    />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input required type="text" name="site" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <textarea
                                        required
                                        class="textarea_editor form-control border-radius-0"
                                        name="activity"
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
            <!-- Simple Datatable End -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('resources/assets/admin/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>

<script>

    $(document).on('submit','#accompForm',function(e){
        e.preventDefault();

        var datas = $(this).serialize();

        $.ajax({
            url: "{{ url('/api/accomp') }}",
            type:"post",
            dataType:'json',
            data:datas,
            success:function(data){
                console.log(data)
                if(data.statusCode == 200){
                    swalSuccess(data.status);
                    $('#accompForm')[0].reset();
                }
            }
        })
    })


    function swalSuccess(msg) {
        swal({
                title: 'Good job!',
                text: msg,
                type: 'success',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                timer: 1500
            })
    }
</script>
@endsection

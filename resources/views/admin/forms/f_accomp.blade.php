
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
                    <form>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input
                                        class="form-control"
                                        type="date"
                                        name="date_"
                                    />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Activity Title</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="title"
                                    />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <textarea
                                        class="form-control"
                                        name="agenda"
                                    >
                                    </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <textarea
                                        class="form-control"
                                    >
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Personels</label>
                                    <input type="text" class="form-control">
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-info">Submit</button>

                    </form>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('resources/assets/admin/vendors/scripts/datatable-setting.js') }}"></script>
@endsection

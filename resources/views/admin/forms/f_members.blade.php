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
                    <form>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ID No.</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Joined</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Expiration</label>
                                    <input
                                        class="form-control"
                                        type="text"
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
                                        placeholder="Johnny Brown"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Johnny Brown"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Johnny Brown"
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
                                        type="text"
                                        placeholder="Johnny Brown"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Johnny Brown"
                                    />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Johnny Brown"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea
                                        class="form-control"
                                    >
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

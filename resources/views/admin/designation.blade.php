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
                            <form>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                    />
                                </div>
                                <button class="btn btn-info">Submit</button>
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
    <script src="{{ url('resources/assets/admin/vendors/scripts/datatable-setting.js') }}"></script>
@endsection

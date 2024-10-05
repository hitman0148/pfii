@extends('layout.template')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin')
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20">
                <h2 class="h3 mb-0">PARDS-FII</h2>
            </div>
        </div>

        <div class="xs-pd-20-10 mb-2">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-info" id="generateBtn">Generate</button>
                    <select name="year" id="md_year" >
                        @foreach($years as $row)
                            <option value="{{ $row->year }}">{{$row->month .'-'. $row->year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Monthly Due</h4>
            </div>

            <div class="pb-20">

                <table class="data-table table stripe hover nowrap" id="tbl_mdue">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
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
@endsection


@section('scripts')
    <script>

        $(document).on('click','#generateBtn',function(){
            console.log('generate');
        })

    </script>
@endsection

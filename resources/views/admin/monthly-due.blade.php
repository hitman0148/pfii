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
                    <button class="btn btn-info btn-sm" id="generateBtn">Generate</button>
                    <select name="year" id="md_year" >
                        @foreach($years as $row)
                            <option value="{{ $row->id }}">{{$row->month .'-'. $row->year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <!-- Simple Datatable start -->
        <form id="mdForm">
        <div class="card-box mb-30">
            <div class="pd-20 row">
                <h4 class="text-blue h4 mr-2">Monthly Due</h4>
                <button class="btn btn-info btn-sm" type="submit">Submit</button>
            </div>

            <div class="pb-20">

                <table class="data-table table stripe hover nowrap" id="tbl_mdue">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->lname .','.$row->fname }}</td>
                                <td>
                                    <input type="hidden" class="mid" name="mid[]" >
                                    <input type="number" name="amt[]">
                                    <input type="hidden" name="member_id[]" value="{{ $row->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </form>
        <!-- Simple Datatable End -->
    </div>
@endsection


@section('scripts')
    <script>

        $(document).ready(function(){
            $('.mid').val($('#md_year').val());
        })

        $(document).on('click','#generateBtn',function(){
            console.log('generate');
        })

        $(document).on('change','#md_year',function(){
            var data = $(this).val();
            $('.mid').val(data);
        })


        $(document).on('submit','#mdForm',function(e){
            e.preventDefault();
            var params = $(this).serialize();
            $.ajax({
                url:"{{ url('/api/monthly') }}",
                type:'post',
                dataType:'json',
                data:params,
                success:function(data){
                    console.log(data);
                    alert(data.msg)
                    $('#mdForm')[0].reset();
                }
            })
        })

    </script>
@endsection

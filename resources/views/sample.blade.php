{{--@extends('layout.template')--}}
{{--@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Sample')--}}
{{--@section('content')--}}
{{--<div class="main-container">--}}
{{--    <div class="xs-pd-20-10 pd-ltr-20">--}}
{{--        <div class="title pb-20">--}}
{{--            <h2 class="h3 mb-0">Hospital Overview</h2>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}



<?php
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

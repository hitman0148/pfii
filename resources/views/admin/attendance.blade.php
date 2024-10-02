<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h4>{{ $title }}</h4>
<div>Date:{{ date("M d Y") }}</div>
<br>
<table id="customers">
    <tr>
        <th width="10%">No.</th>
        <th width="25%">LastName</th>
        <th width="25%">FirstName</th>
        <th>Signature</th>
    </tr>
    @foreach($members as $key => $row)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $row->lname }}</td>
        <td>{{ $row->fname  }}</td>
        <td></td>
    </tr>
    @endforeach

</table>

</body>
</html>



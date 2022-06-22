<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <meta charset="UTF-8">
    <title>Laporan</title>
    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            background: url("{{ public_path('image/majestic-logo.png')}}");
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .paper {
            margin-top: 150px;
            margin-left: 50px;
            margin-right: 50px;
        }

        .table-report {
            width: 100%;
            margin-top: 150px;
            margin-left: 50px;
            margin-right: 50px;
        }

        h1, h4, span {
            text-align : center;
        }
    </style>
</head>

<body>
    <div class="paper">
        <h1>{{$project->namaClient}}</h1>
        <table>
            <tr>
                <td>Tanggal : </td>
                <td>{{$project->tglMulai}} - {{$project->tglSelesai}}</td>
            </tr>
            <tr>
                <td>Harga : </td>
                <td>{{$project->harga}}</td>
            </tr>
        </table>
        <table id="table-report">
            <thead>
                <tr>
                    <th>{{$project->namaClient}}</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                </tr>

            </thead>
            <tbody>
                <td>1. </td>
                <td>Project A</td>
            </tbody>
        </table>
    </div>
</body>

</html>
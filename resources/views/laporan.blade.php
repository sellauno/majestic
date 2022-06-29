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
            border-collapse: collapse;
            margin-top: 20px;
            /* margin-left: 50px;
            margin-right: 50px; */
        }

        .table-report td, th {
            border: 1px solid;
            border-color: black;
            /* margin-top: 150px;
            margin-left: 50px;
            margin-right: 50px; */
        }

        h1,
        h4,
        span {
            text-align: center;
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
        <table class="table-report">
            <thead>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </thead>
            <tbody>
                @foreach($layanan as $l)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$l->kategori}}</td>
                    <td>{{$l->jumlah}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table-report">
            @foreach($teams as $team)
            <thead>
                <th text-align="left" colspan="3">{{$team->name}}</th>
            </thead>
            <tbody>
                @foreach($subtodos as $todo)
                @if($todo->idUser == $team->idUser)
                <tr>
                    <td>{{$todo->subtodo}}</td>
                    <td>{{$todo->updated_at}}</td>
                    <td>{{$todo->keterangan}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>
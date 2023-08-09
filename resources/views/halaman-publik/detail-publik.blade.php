<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail RPS</title>
    @extends('layouts/style')

</head>

<body>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rps as $rencana_studi)
                    <tr>
                        <td>Semester {{ $rencana_studi->semester }}</td>
                        <td>{{ $rencana_studi->prodi }}</td>
                        <td>{{ $rencana_studi->jurusan }}</td>
                        <td>
                            @if ($rencana_studi->file)
                            <a href="{{route('detail-download',['id'=>$rencana_studi->id])}}">Download RPS</a>
                            @else
                            File tidak tersedia
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
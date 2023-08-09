@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Monitoring</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/monitoring/page') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Monitoring</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="card flex-fill student-space comman-shadow">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title">Monitoring</h5>
                    <ul class="chart-list-out student-ellips">
                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table star-student table-hover table-center table-borderless table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">RPS Selesai</th>
                                    <th class="text-center">RPS Belum Selesai</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listProdi as $prodi)
                                <tr>
                                    <td class="text-center">{{$prodi->prodi}}</td>
                                    <td class="text-center">{{ \App\Models\Studi::where('prodi_id', $prodi->id)->where('status', 2)->count() }}</td>
                                    <td class="text-center">{{ \App\Models\Studi::where('prodi_id', $prodi->id)->where('status', 3)->count() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
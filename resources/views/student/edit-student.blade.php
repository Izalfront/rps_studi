@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Selamat Datang {{ Session::get('name') }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('edit-student') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex">

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
                                        <th>ID Jurusan Elektro</th>
                                        <th class="text-center">Prodi</th>
                                        <th class="text-center">RPS Selesai</th>
                                        <th class="text-center">RPS Belum Selesai</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>12345678</div>
                                        <td class="text-center">D3 Teknik Informatika</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>12345678</div>
                                        </td>
                                        <td class="text-center">D4 SIKC</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>12345678</div>
                                        </td>
                                        <td class="text-center">D3 Teknik Elektronika</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>12345678</div>
                                        </td>
                                        </td>
                                        <td class="text-center">D3 Teknik Listrik</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>12345678</div>
                                        </td>
                                        <td class="text-center">D4 TRPE</td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title ">Reporting</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="activity-groups">
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>RPS D3 Teknik Informatika</h4>
                                    <h5>Semester 1 - 6</h5>
                                </div>
                                <div class="award-time-list">
                                    <a href="/reporting">Lihat Detail</a>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>RPS D3 Teknik Elektronika</h4>
                                    <h5>Semester 1 - 6</h5>
                                </div>
                                <div class="award-time-list">
                                    <a href="/reporting">Lihat Detail</a>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>D4 SIKC</h4>
                                    <h5>Semester 1 - 8</h5>
                                </div>
                                <div class="award-time-list">
                                    <a href="/reporting">Lihat Detail</a>
                                </div>
                            </div>
                            <div class="activity-awards mb-0">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Award">
                                </div>
                                <div class="award-list-outs">
                                    <h4>D3 Teknik Listrik</h4>
                                    <h5>Semester 1 - 6</h5>
                                </div>
                                <div class="award-time-list">
                                    <a href="/reporting">Lihat Detail</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
</div>
</div>
</div>
@endsection
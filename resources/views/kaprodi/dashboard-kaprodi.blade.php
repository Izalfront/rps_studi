@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Dashboard kaprodi RPS</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kaprodi/dashboard/page') }}">Kaprodi</a></li>
                        <li class="breadcrumb-item active">Menampilkan RPS</li>
                    </ul>
                </div>
            </div>
            <div class="card flex-fill comman-shadow">
                <div class="card-header d-flex align-items-center">
                </div>
                <div class="card-body">
                    <div class="activity-groups">
                        <div class="activity-awards">

                            <div class="award-list-outs">
                                <h4><a href="#"><b> RPS Semester 4 </b></a></h4>
                                <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                            </div>
                            <div class="award-time-list">
                                <style>
                                    .award-time-list a {
                                        margin-right: 40px;
                                    }

                                    .teks {
                                        padding-top: 50px;
                                    }
                                </style>
                                <div class="teks">
                                    <p style="color: green;">4 berhasil ditampilkan</p><br />
                                    <p style="color: red;">3 RPS tidak ditampilkan</p>
                                </div>
                            </div>
                        </div>

                        <div class="activity-awards">

                            <div class="award-list-outs">
                                <h4><a href="#"><b> RPS Semester 3 </b></a></h4>
                                <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                            </div>
                            <div class="award-time-list">
                                <style>
                                    .award-time-list a {
                                        margin-right: 40px;
                                    }

                                    .teks {
                                        padding-top: 50px;
                                    }
                                </style>
                                <div class="teks">
                                    <p style="color: green;">4 berhasil ditampilkan</p><br />
                                    <p style="color: red;">3 RPS tidak ditampilkan</p>
                                </div>
                            </div>
                        </div>

                        <div class="activity-awards">

                            <div class="award-list-outs">
                                <h4><a href="#"><b> RPS Semester 2 </b></a></h4>
                                <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                            </div>
                            <div class="award-time-list">
                                <style>
                                    .award-time-list a {
                                        margin-right: 40px;
                                    }

                                    .teks {
                                        padding-top: 50px;
                                    }
                                </style>
                                <div class="teks">
                                    <p style="color: green;">4 berhasil ditampilkan</p><br />
                                    <p style="color: red;">3 RPS tidak ditampilkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endsection
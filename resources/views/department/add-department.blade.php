@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Penyetujuan RPS</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Kajur</a></li>
                        <li class="breadcrumb-item active">Penyetujuan RPS</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card flex-fill comman-shadow">
            <div class="card-header d-flex align-items-center">

                <ul class="chart-list-out student-ellips">
                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <div class="activity-groups">
                    <div class="activity-awards">

                        <div class="award-list-outs">
                            <h4><b><a href="#">RPS Semester 4 </a></b></h4>
                            <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>

                            <button class="btn btn-primary">Setuju</button>
                            <button class="btn btn-danger">Tidak</button>
                        </div>
                    </div>
                    <div class="activity-awards">

                        <div class="award-list-outs">
                            <h4><a href="#"><b>RPS Semester 2 </b></a></h4>
                            <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>

                            <button class="btn btn-primary">Setuju</button>
                            <button class="btn btn-danger">Tidak</button>
                        </div>
                    </div>
                    <div class="activity-awards">

                        <div class="award-list-outs">
                            <h4><a href="#"><b>RPS Semester 1 </b></a></h4>
                            <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>

                            <button class="btn btn-primary setuju ">Setuju</button>
                            <button class="btn btn-danger">Tidak</button>
                        </div>
                    </div>
                    <div class="activity-awards mb-0">

                        <div class="award-list-outs">
                            <h4><a href="#"><b>RPS Semester 5</b></a></h4>
                            <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>
                            <button class="btn btn-primary">Setuju</button>
                            <button class="btn btn-danger">Tidak</button>
                        </div>
                    </div>

                </div>
            </div>
            @endsection
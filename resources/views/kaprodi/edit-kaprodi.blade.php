@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Menampilkan RPS</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kaprodi/edit/page') }}">Kaprodi</a></li>
                        <li class="breadcrumb-item active">Menampilkan RPS</li>
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
                        <div class="award-boxs">
                            <img src="award-icon-02.svg" alt="">
                        </div>
                        <div class="award-list-outs">
                            <h4><a href="#"><b> RPS Semester 4 </b></a></h4>
                            <h5>Jurusan Elektro Prodi Teknik Informatika</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>

                            <p style="color: green;">RPS berhasil ditampilkan</p>
                        </div>
                    </div>
                    <div class="activity-awards">
                        <div class="award-boxs">
                            <img src="award-icon-02.svg" alt="">
                        </div>
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

                            <p style="color: green;">RPS berhasil ditampilkan</p>
                        </div>
                    </div>
                    <div class="activity-awards">
                        <div class="award-boxs">
                            <img src="award-icon-02.svg" alt="">
                        </div>
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

                            <p style="color: red;">RPS berhasil ditampilkan</p>
                        </div>
                    </div>
                    <div class="activity-awards mb-0">
                        <div class="award-boxs">
                            <img src="award-icon-02.svg" alt="">
                        </div>
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
                            <p style="color: red;">RPS berhasil ditampilkan</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
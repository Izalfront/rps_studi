@extends('layouts.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Filtering program studi</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Pengajar</a></li>
                        <li class="breadcrumb-item active">Add Pengajar</li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('teacher/save') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="card flex-fill comman-shadow">

                                    <div class="card-body">

                                        <div class="activity-groups">
                                            <div class="activity-awards">

                                                <div class="award-list-outs">
                                                    <h4><b>RPS Semester 4 A</b></h4>
                                                    <h5>Rps Andi M.Kom.pdf</h5>
                                                </div>
                                                <div class="award-time-list">
                                                    <style>
                                                        .award-time-list a {
                                                            margin-right: 40px;
                                                        }
                                                    </style>

                                                    <a href="#">Detail</a>
                                                    <a href="#">Download</a>
                                                </div>
                                            </div>
                                            <div class="activity-awards">

                                                <div class="award-list-outs">
                                                    <h4><b>RPS Semester 4 B</b></h4>
                                                    <h5>Rps Andi M.Kom.pdf</h5>
                                                </div>
                                                <div class="award-time-list">
                                                    <style>
                                                        .award-time-list a {
                                                            margin-right: 40px;
                                                        }
                                                    </style>

                                                    <a href="#">Detail</a>
                                                    <a href="#">Download</a>

                                                </div>
                                            </div>
                                            <div class="activity-awards">

                                                <div class="award-list-outs">
                                                    <h4><b>RPS Semester 4 C</b></h4>
                                                    <h5>Rps Andi M.Kom.pdf</h5>
                                                </div>
                                                <div class="award-time-list">
                                                    <style>
                                                        .award-time-list a {
                                                            margin-right: 40px;
                                                        }
                                                    </style>

                                                    <a href="#">Detail</a>
                                                    <a href="#">Download</a>
                                                </div>
                                            </div>
                                            <div class="activity-awards mb-0">

                                                <div class="award-list-outs">
                                                    <h4><b>RPS Semester 4 D</b></h4>
                                                    <h5>Rps Andi M.Kom.pdf</h5>
                                                </div>
                                                <div class="award-time-list">
                                                    <style>
                                                        .award-time-list a {
                                                            margin-right: 40px;
                                                        }
                                                    </style>

                                                    <a href="#">Detail</a>
                                                    <a href="#">Download</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
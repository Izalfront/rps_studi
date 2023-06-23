@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Reporting</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/reporting/page') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Reporting</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


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

                    @foreach ($prodi as $program_studi)
                    <div class="activity-awards">
                        <div class="award-boxs">
                            <img src="award-icon-0002.svg" alt="">
                        </div>
                        <div class="award-list-outs">
                            <h4>RPS {{ $program_studi->prodi }}</h4>
                            <h5>Semester 1 - 6</h5>
                        </div>
                        <div class="award-time-list">
                            <a href="/reporting">Lihat Detail</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
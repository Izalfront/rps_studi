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
                        @foreach($prodiListes as $prodi)
                        <div class="activity-awards">
                            <div class="award-list-outs">
                                <h4><a href="#"><b>RPS Prodi {{$prodi->prodi}}</b></a></h4>
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
                                    <p style="color: green;">
                                        {{ \App\Models\Studi::where('prodi_id', $prodi->id)->where('status', 2)->count() }} berhasil ditampilkan
                                    </p><br />
                                    <p style="color: red;">
                                        {{ \App\Models\Studi::where('prodi_id', $prodi->id)->where('status', 3)->count() }} tidak ditampilkan
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
            @endsection
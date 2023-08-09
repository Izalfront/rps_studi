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
                @foreach($PenyetujuanKaprodi as $kaprodi)
                <div class="activity-groups">
                    <div class="activity-awards">
                        <div class="award-boxs">
                            <img src="award-icon-02.svg" alt="">
                        </div>
                        <div class="award-list-outs">
                            <h4><a href="#"><b>RPS {{$kaprodi->matkul->matkul}}</b></a></h4>
                            <h5>Jurusan {{$kaprodi->jurusan->jurusan}} Prodi {{$kaprodi->prodi->prodi}} Semester {{ $kaprodi->semester }}</h5>
                        </div>
                        <div class="award-time-list">
                            <style>
                                .award-time-list a {
                                    margin-right: 40px;
                                }
                            </style>

                            @if ($kaprodi->status == 2)
                            <p style="color: green;">RPS berhasil ditampilkan</p>
                            @else
                            <p style="color: red;">RPS tidak berhasil ditampilkan</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    @endsection
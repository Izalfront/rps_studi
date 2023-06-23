@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Monitoring</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Kajur</a></li>
                        <li class="breadcrumb-item active">Monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
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
    @endsection
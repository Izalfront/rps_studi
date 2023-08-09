@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail Semester</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Detail semester</a></li>
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Matkul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rps as $rencana_studi)
                        <tr>
                            <td>Semester {{ $rencana_studi->semester }}</td>
                            <td>{{ $rencana_studi->matkul }}</td>
                            <td>
                                @if ($rencana_studi->file)
                                <a href="{{route('student/detail/download',['id'=>$rencana_studi->id])}}">Download RPS</a>
                                @else
                                File tidak tersedia
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
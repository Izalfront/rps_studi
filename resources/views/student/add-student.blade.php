@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Slot Semester</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Admin</a></li>
                            <li class="breadcrumb-item active">Slot Semester</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('student/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Informasi Semester
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Jurusan <span class="login-danger">*</span></label>
                                        <select class="form-control" name="Jurusan">
                                            <option selected disabled>Pilih Jurusan</option>
                                            @foreach($jurusanListes as $jurusan)
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prodi <span class="login-danger">*</span></label>
                                        <select class="form-control " name="Prodi">
                                            <option selected disabled value="">Pilih Prodi </option>
                                            @foreach($prodiListes as $jurusan)
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->prodi }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Semester </label>
                                        <input class="form-control" type="number" min="1" max="8" name="Semester" placeholder="Isi Semester">

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama MataKuliah </label>
                                        <input class="form-control" type="text" name="Matkul" placeholder="Isi Nama Matkul">

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama Pengajar </label>
                                        <input class="form-control" type="text" name="Dosen" placeholder="Isi Nama Pengajar">

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Kode Matkul </label>
                                        <input class="form-control" type="text" name="Kode_MK" placeholder="Isi kode matkul">

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Deskripsi Matkul </label>
                                        <input class="form-control" type="number" name="SKS" placeholder="Isi SKS">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <input type="submit" class="btn btn-primary" value="Tambah Data">
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
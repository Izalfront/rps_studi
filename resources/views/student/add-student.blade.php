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
                                        <select class="form-control select  @error('gender') is-invalid @enderror" name="gender">
                                            <option selected disabled>Pilih Jurusan</option>
                                            <option value="#">Elektro</option>
                                            <option value="#">Administrasi Bisnis</option>
                                            <option value="#">Mesin</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prodi <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('blood_group') is-invalid @enderror" name="blood_group">
                                            <option selected disabled>Pilih Prodi </option>
                                            <option value="#">Teknik Informatika</option>
                                            <option value="#">Teknik Elektronika</option>
                                            <option value="#">Teknik Listrik</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mata Kuliah</label>
                                        <input class="form-control @error('admission_id') is-invalid @enderror" type="text" name="admission_id" placeholder="Isi Mata Kuliah" value="{{ old('admission_id') }}">

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Semester </label>
                                        <input class="form-control" type="text" name="phone_number" placeholder="Isi Semester" value="{{ old('phone_number') }}">


                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <a href="{{ route('student.add')}}" class="btn btn-primary">Tambah data</a>
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
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Tambah file</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Tambah file</a></li>
                        <li class="breadcrumb-item active">Pengajar</li>
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
                            <h4><a href="#"><b>Upload File anda disini </b></a></h4>
                            <h5>Nama sesuaikan dengan prodi dan semester dengan format pdf</h5>
                        </div>
                        <div class="award-time-list ">
                            <form action="{{ route('teacher.file', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04" aria-label="Upload" name="file">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
</div>
@endsection










@endsection
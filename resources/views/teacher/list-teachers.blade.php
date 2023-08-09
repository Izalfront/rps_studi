@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<style>
    input[type="file"] {
        color: transparent;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Dashboard Pengajar</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                    <div class="accordion" id="myAccordion">
                        @foreach ($accordionData as $key => $matkulIds)
                        @php
                            [$prodi_id, $semester] = explode('_', $key);
                            $prodi = App\Models\Prodi::find($prodi_id);
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $key }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                    <!-- Semester: {{ $semester }} -->
                                    <a href="#"><b> Prodi {{ $prodi->prodi }} Semester {{ $semester }} </b></a>
                                </button>
                            </h2>
                            <div id="collapse{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $key }}" data-bs-parent="#myAccordion">
                                <div class="accordion-body">
                                    @foreach ($matkulIds as $matkulData)
                                    @php
                                        $matkul = App\Models\Matkul::find($matkulData['matkul_id']);
                                        $studi = $studiListes->find($matkulData['id']);
                                    @endphp

                                    <div class="activity-awards">
                                        <div class="award-list-outs">
                                            <h4><a href="#"><b> RPS {{ $matkul->matkul }} </b></a></h4>
                                            <h5>{{ $matkul->kode_mk }} | {{ $matkul->sks }} SKS</h5>

                                            
                                        </div>
                                        <div class="award-time-list">
                                        <style>
                                            .award-time-list {
                                                display: flex;
                                                align-items: center;
                                                flex-direction: column;
                                                justify-content: space-between;
                                            }

                                            .award-time-list p,
                                            .award-time-list button {
                                                margin-top: 10px;
                                            }

                                            .award-time-list .belum {
                                                margin-left: 250px;
                                            }

                                            .award-time-list .hapus {
                                                margin-left: 72px;
                                            }

                                            .award-time-list .tolak {
                                                margin-left: 100px;
                                            }

                                            .award-time-list .edit {
                                                flex-direction: column;
                                            }

                                            .award-time-list .uploadfile {
                                                margin-left: 20px;
                                            }
                                        </style>
                                        @if($studi->status == 0)
                                        <div class="tombol">

                                            <p style="color: red;" class="belum">Belum ditambah</p>
                                            <form style="display: inline-block;" action="{{ route('teacher.file', ['id'=>$studi->id]) }}" method="post" enctype="multipart/form-data" id="upload-form">
                                                @csrf

                                                <input type="file" id="file" class="form-control uploadfile" name="file">
                                            </form>


                                            <script>
                                                document.getElementById('file').addEventListener('change', function() {
                                                    if (confirm('Are you sure you want to upload the file?')) {
                                                        document.getElementById('upload-form').submit();
                                                    } else {
                                                        window.location.href = "{{ route('teacher/list/page') }}"; // Redirect back to the same Laravel route
                                                    }
                                                });
                                            </script>


                                        </div>
                                        @elseif($studi->status == 1)
                                        <p style="color: red;" class="belum">Belum di setujui</p>
                                        <div class="tombol">
                                            <form style="display: inline-block;" action="/teacher-reset/{{$studi->id}}" method="get">
                                                <button type="submit" class="btn btn-danger hapus">Hapus</button>
                                            </form>
                                        </div>
                                        @elseif($studi->status == 2)
                                        <p style="color: green;">Disetujui</p>
                                        @elseif($studi->status == 3)
                                        <p style="color: Red;" class="tolak">Ditolak</p>
                                        <div class="tombol">
                                            <form style="display: inline-block;" action="/teacher-reset/{{$studi->id}}" method="get">
                                                <button type="submit" class="btn btn-danger hapus">Hapus</button>
                                            </form>
                                        </div>
                                        @endif
                                        </div>
                                    </div>

<hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@section('script')
{{-- delete js --}}
<script>
    $(document).on('click', '.teacher_delete', function() {
        var _this = $(this).parents('tr');
        $('.e_id').val(_this.find('.id').text());
    });
</script>
@endsection

@endsection
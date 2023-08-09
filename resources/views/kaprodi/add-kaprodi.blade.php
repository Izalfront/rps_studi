@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Penyetujuan RPS</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kaprodi/add/page') }}">Kaprodi</a></li>
                        <li class="breadcrumb-item active">Penyetujuan RPS</li>
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
                                    $studi = $kaprodiValidasi->find($matkulData['id']);
                                    @endphp

                                    <div class="activity-awards">
                                        <div class="award-list-outs">
                                            <h4><b><a href="{{ route('kaprodi.download', ['id' => $studi->id]) }}">RPS Semester {{ $matkul->matkul }}</a></b></h4>
                                            <h5>{{ $matkul->kode_mk }} | {{ $matkul->sks }} SKS</h5>


                                        </div>
                                        <div class="award-time-list">
                                            <style>
                                                .award-time-list a {
                                                    margin-right: 40px;
                                                }
                                            </style>

                                            <a href="{{ route('kaprodi/setuju', ['id'=>$studi->id]) }}" class="btn btn-primary">Setuju</a>
                                            <a href="#" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#modal-{{ $studi->id }}">Tolak</a>
                                            <div class="modal fade" id="modal-{{ $studi->id }}" tabindex="-1" aria-labelledby="modal-{{ $studi->id }}-label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-{{ $studi->id }}-label">RPS {{ $matkul->matkul }} Semester {{ $semester }} {{ $prodi->prodi }}</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('kaprodi/tolak', ['id'=>$studi->id]) }}" method="post">
                                                                @csrf

                                                                <div class="mb-3">
                                                                    <label for="pesan" class="form-label">Isi Pesan:</label>
                                                                    <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
            @endsection
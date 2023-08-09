@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <h3 class="page-title">Pesan dari Kaprodi</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pesanList as $pesan)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-{{ $pesan->id }}">
                                    RPS {{ $pesan->matkul->matkul }} Semester {{ $pesan->semester }} {{ $pesan->prodi->prodi }}
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-{{ $pesan->id }}" tabindex="-1" aria-labelledby="modal-{{ $pesan->id }}-label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-{{ $pesan->id }}-label">RPS {{ $pesan->matkul->matkul }} Semester {{ $pesan->semester }} {{ $pesan->prodi->prodi }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Add content for the modal body here -->
                                        <!-- Example: -->
                                        <p>{{$pesan->pesan}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Publik</title>
    @extends('layouts/style')
</head>

<body>
    <!-- Tambahkan navbar Bootstrap di sini -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Informasi RPS Berbasis Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card flex-fill comman-shadow">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title ">Daftar RPS per Jurusan</h5>
            <ul class="chart-list-out student-ellips">
                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="card-body">

            <div class="activity-groups">

                @foreach ($jurusan as $jur)
                <div class="accordion" id="accordionJurusan{{ $jur->id }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingJurusan{{ $jur->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJurusan{{ $jur->id }}" aria-expanded="true" aria-controls="collapseJurusan{{ $jur->id }}">
                                {{ $jur->jurusan }}
                            </button>
                        </h2>
                        <div id="collapseJurusan{{ $jur->id }}" class="accordion-collapse collapse show" aria-labelledby="headingJurusan{{ $jur->id }}" data-bs-parent="#accordionJurusan{{ $jur->id }}">
                            <div class="accordion-body">
                                @foreach ($jur->prodi as $program_studi)
                                <div class="activity-awards">
                                    <div class="award-boxs">
                                        <img src="award-icon-0002.svg" alt="">
                                    </div>
                                    <div class="award-list-outs">
                                        <h4>Prodi {{ $program_studi->prodi }}</h4>
                                        <h5>Semester 1 - 6</h5>
                                    </div>
                                    <div class="award-time-list">
                                        <a href="{{ route('detail-publik', ['id' => $program_studi->id]) }}">Lihat
                                            Detail</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
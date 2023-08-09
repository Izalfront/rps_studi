@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <h3 class="page-title">Pesan dari Kaprodi</h3>
        </div>
        <div class="card">
            <div class="card-body">

                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="pengajar" class="form-label">Pilih Pengajar:</label>
                        <select name="pengajar" id="pengajar" class="form-select">
                            <!-- Tampilkan daftar pengajar yang tersedia dalam dropdown -->
                            <option value="1">Pengajar 1</option>
                            <option value="2">Pengajar 2</option>
                            <!-- Tambahkan opsi lain sesuai dengan data pengajar yang ada di database -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pesan" class="form-label">Isi Pesan:</label>
                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
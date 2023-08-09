<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Prodi;
use App\Models\Rps;
use App\Models\Jurusan;
use App\Models\Studi;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PublicController extends Controller
{
    public function halamanPublik()
    {
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        return view('halaman-publik.publik', compact('prodi', 'jurusan'));
    }

    public function detailPublik(Request $request, $id)
    {
        $semester = $request->query('semester');

        $rps = Studi::join('prodi', 'studi.prodi_id', '=', 'prodi.id')
            ->join('jurusan', 'prodi.jurusan_id', '=', 'jurusan.id')
            ->where('studi.prodi_id', $id)
            ->get(['studi.id', 'studi.semester', 'prodi.prodi', 'jurusan.jurusan', 'studi.file']);

        return view('halaman-publik.detail-publik', [
            'rps' => $rps,
            'semester' => $semester
        ]);
    }

    public function DetailDownloadPublik($id)
    {
        $downloaded = Studi::find($id);
        $downloadFileName = $downloaded->file;
        $filePath = storage_path('app/public/files/' . $downloadFileName);

        return response()->download($filePath);
    }
}

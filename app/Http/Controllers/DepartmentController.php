<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Rps;
use App\Models\Jurusan;
use App\Models\Studi;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /** index page department */
    public function indexDepartment()
    {
        $ListKajur = Prodi::all();
        return view('department.add-department', compact('ListKajur'));
    }

    public function DetailReporting(Request $request, $id)
    {
        $semester = $request->query('semester');

        // Mengambil data RPS, nama prodi, dan nama jurusan dari tabel studi, prodi, dan jurusan
        $rps = Studi::join('prodi', 'studi.prodi_id', '=', 'prodi.id')
            ->join('jurusan', 'prodi.jurusan_id', '=', 'jurusan.id')
            ->where('studi.prodi_id', $id)
            ->get(['studi.id', 'studi.semester', 'prodi.prodi', 'jurusan.jurusan', 'studi.file']);

        return view('department.detail-reporting-department', [
            'rps' => $rps,
            'semester' => $semester
        ]);
    }

    public function downloadReporting($id)
    {
        $downloaded = Studi::find($id);
        $downloadFileName = $downloaded->file;
        $filePath = storage_path('app/public/files/' . $downloadFileName);

        return response()->download($filePath);
    }

    /** edit record */
    public function editDepartment()
    {
        $prodiKajur = Prodi::all();
        return view('department.edit-departmen', compact('prodiKajur'));
    }
}

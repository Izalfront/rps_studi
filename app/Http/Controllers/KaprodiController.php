<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Studi;
use Brian2694\Toastr\Facades\Toastr;


class KaprodiController extends Controller
{
    /** index page kaprodi */
    public function indexKaprodi()
    {
        $kaprodiValidasi = Studi::where('status', 1)->get();
        $accordionData = [];
        foreach ($kaprodiValidasi as $studi) {
            $key = $studi->prodi_id . '_' . $studi->semester;
    
            if (!isset($accordionData[$key])) {
                $accordionData[$key] = [];
            }
    
            $accordionData[$key][] = [
                'matkul_id' => $studi->matkul_id,
                'status' => $studi->status,
                'id' => $studi->id,
            ];
        }
        
        return view('kaprodi.add-kaprodi', compact('kaprodiValidasi' , 'accordionData'));
    }

    /** edit kaparodi */
    public function editKaprodi()
    {
        $PenyetujuanKaprodi = Studi::all();
        return view('kaprodi.edit-kaprodi', compact('PenyetujuanKaprodi'));
    }

    public function dashboardKaprodi()
    {
        $prodiListes = Prodi::all();
        return view('kaprodi.dashboard-kaprodi', compact('prodiListes'));
    }

    public function downloadKaprodi($id)
    {
        $downloadedkaprodi = Studi::find($id);
        $downloadFileName = $downloadedkaprodi->file;
        $filePath = storage_path('app/public/files/' . $downloadFileName);

        return response()->download($filePath);
    }

    public function setujuKaprodi($id)
    {
        $kaprodi = Studi::find($id);
        $kaprodi->status = 2;
        $kaprodi->save();
        Toastr::success('Has been add successfully :)', 'Success');
        return redirect()->back();
        // return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui']);
    }

    public function tolakKaprodi(Request $request, $id)
    {
        $tolakKaprodi = Studi::find($id);
        $tolakKaprodi->status = 3;
        $tolakKaprodi->pesan = $request['pesan'];
        $tolakKaprodi->save();
        Toastr::success('RPS ditolak', 'Success');
        return redirect()->back();
    }

    public function showKirimPesan()
    {
        return view('kaprodi.pesan-kaprodi');
    }
}

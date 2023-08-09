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
use App\Models\Matkul;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentController extends Controller
{
    /** index page student list */
    public function student()
    {
        $studentList = Student::all();
        return view('student.student', compact('studentList'));
    }

    /** index page student grid */
    public function studentGrid()
    {
        $studentList = Student::all();
        return view('student.student-grid', compact('studentList'));
    }

    /** student add page */
    public function studentAdd()
    {
        $jurusanListes = Jurusan::all();
        $prodiListes = Prodi::all();
        return view('student.add-student', compact('jurusanListes', 'prodiListes'));
    }

    /** student save record */
    public function studentSave(Request $request)
    {

        $request->validate([
            'Jurusan' => 'required',
            'Prodi' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $matkul = new Matkul;
            $matkul->matkul = $request['Matkul'];
            $matkul->kode_mk = $request['Kode_MK'];
            $matkul->semester = $request['Semester'];
            $matkul->prodi_id = $request['Prodi'];
            $matkul->sks = $request['SKS'];
            $matkul->save();

            $studi = new Studi;
            $studi->jurusan_id   = $request->Jurusan;
            $studi->prodi_id = $request->Prodi;
            $studi->matkul_id = $matkul->id;
            $studi->semester = $request->Semester;
            $studi->status = 0;
            $studi->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, Add new studi  :)', 'Error');
            return redirect()->back();
        }
    }

    /** view for edit student */
    public function studentEdit($id)
    {
        $studentEdit = Student::where('id', $id)->first();
        return view('student.edit-student', compact('studentEdit'));
    }

    /** update record */
    public function studentUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            if (!empty($request->upload)) {
                unlink(storage_path('app/public/student-photos/' . $request->image_hidden));
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/student-photos/'), $upload_file);
            } else {
                $upload_file = $request->image_hidden;
            }

            $updateRecord = [
                'upload' => $upload_file,
            ];
            Student::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update student  :)', 'Error');
            return redirect()->back();
        }
    }

    /** student delete */
    public function studentDelete()
    {
        $studiListes = Studi::all();
        $accordionData = [];
        foreach ($studiListes as $studi) {
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
        
        return view('student.delete-student', compact('studiListes', 'accordionData'));
    }

    public function destroy($id)
    {
        $deletedStudi = Studi::findOrFail($id);
        $deletedStudi->delete();

        Toastr::success('Data prodi berhasil dihapus', 'Sukses');
        return redirect()->back();
    }

    /** student profile page */
    public function studentProfile($id)
    {
        $studentProfile = Student::where('id', $id)->first();
        return view('student.student-profile', compact('studentProfile'));
    }

    /** student reporting */
    public function ReportingStudent()
    {
        $prodi = Prodi::all();
        return view('student.student-reporting', compact('prodi'));
    }

    /** student monitoring */
    public function MonitoringStudent()
    {
        $listProdi = Prodi::all();
        return view('student.student-monitoring', compact('listProdi'));
    }

    public function DetailReporting(Request $request, $id)
    {
        $semester = $request->query('semester');

        // Mengambil data RPS, nama prodi, dan nama jurusan dari tabel studi, prodi, dan jurusan
        $rps = Studi::join('prodi', 'studi.prodi_id', '=', 'prodi.id')
            ->join('jurusan', 'prodi.jurusan_id', '=', 'jurusan.id')
            ->join('matkul', 'studi.matkul_id', '=', 'matkul.id')
            ->where('studi.prodi_id', $id)
            ->get(['studi.id', 'studi.semester', 'prodi.prodi', 'jurusan.jurusan', 'matkul.matkul', 'studi.file']);

        return view('student.detail-reporting', [
            'rps' => $rps,
            'semester' => $semester
        ]);
    }

    public function detailDownload($id)
    {
        $downloaded = Studi::find($id);
        $downloadFileName = $downloaded->file;
        $filePath = storage_path('app/public/files/' . $downloadFileName);

        return response()->download($filePath);
    }
    /** select 2 dropdown testing */
    public function index()
    {
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
        return view('student.index', compact('jurusans', 'prodis'));
    }

    public function getProdiByJurusan(Request $request)
    {
        $jurusanId = $request->input('jurusan_id');
        $prodis = Prodi::where('jurusan_id', $jurusanId)->get();

        return response()->json([
            'prodis' => $prodis
        ]);
    }
}

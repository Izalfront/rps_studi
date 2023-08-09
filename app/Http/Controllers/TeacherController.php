<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Prodi;
use App\Models\Rps;
use App\Models\Jurusan;
use App\Models\Studi;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /** add teacher page */
    public function teacherAdd()
    {
        $studiTeacher = Studi::where('status', 2)->get();
        return view('teacher.add-teacher', compact('studiTeacher'));
    }

    /** filtering teacher page */
    public function teacherFiltering($id)
    {
        $studiFiltering = Studi::find($id);
        $studiFileName = $studiFiltering->file;
        $filePath = storage_path('app/public/files/' . $studiFileName);


        return response()->download($filePath);
    }

    /** teacher list */
    public function teacherList()
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

        return view('teacher.list-teachers', compact('studiListes', 'accordionData'));
    }

    /** save record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'full_name'       => 'required|string',
            'gender'          => 'required|string',
            'date_of_birth'   => 'required|string',
            'mobile'          => 'required|string',
            'joining_date'    => 'required|string',
            'qualification'   => 'required|string',
            'experience'      => 'required|string',
            'username'        => 'required|string',
            'email'           => 'required|string',
            'password'        => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'address'         => 'required|string',
            'city'            => 'required|string',
            'state'           => 'required|string',
            'zip_code'        => 'required|string',
            'country'         => 'required|string',
        ]);

        try {

            $dt        = Carbon::now();
            $todayDate = $dt->toDayDateTimeString();


            User::create([
                'name'      => $request->full_name,
                'email'     => $request->email,
                'join_date' => $todayDate,
                'role_name' => 'Teacher',
                'password'  => Hash::make($request->password),
            ]);
            $user_id = DB::table('users')->select('user_id')->orderBy('id', 'DESC')->first();

            $saveRecord = new Teacher;
            $saveRecord->teacher_id    = $user_id->user_id;
            $saveRecord->full_name     = $request->full_name;
            $saveRecord->gender        = $request->gender;
            $saveRecord->date_of_birth = $request->date_of_birth;
            $saveRecord->mobile        = $request->mobile;
            $saveRecord->joining_date  = $request->joining_date;
            $saveRecord->qualification = $request->qualification;
            $saveRecord->experience    = $request->experience;
            $saveRecord->username      = $request->username;
            $saveRecord->address       = $request->address;
            $saveRecord->city          = $request->city;
            $saveRecord->state         = $request->state;
            $saveRecord->zip_code      = $request->zip_code;
            $saveRecord->country       = $request->country;
            $saveRecord->save();

            Toastr::success('Has been add successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollback();
            Toastr::error('fail, Add new record  :)', 'Error');
            return redirect()->back();
        }
    }

    /** edit record */
    public function editRecord($id)
    {
        $teacher = Teacher::where('id', $id)->first();
        return view('teacher.edit-teacher', compact('teacher'));
    }

    /** update record teacher */
    public function updateRecordTeacher(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'full_name'     => $request->full_name,
                'gender'        => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'mobile'        => $request->mobile,
                'joining_date'  => $request->joining_date,
                'qualification' => $request->qualification,
                'experience'    => $request->experience,
                'username'      => $request->username,
                'address'       => $request->address,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip_code'      => $request->zip_code,
                'country'      => $request->country,
            ];
            Teacher::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update record  :)', 'Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function destroy($id)
    {
        $deletedStudi = Studi::findOrFail($id);
        $deletedStudi->delete();

        Toastr::success('Data prodi berhasil dihapus', 'Sukses');
        return redirect()->back();
    }

    /** upload record */
    public function teacherUpload()
    {
        return view('teacher.upload-teacher', ['studi' => Studi::all()]);
    }


    public function teacherFile(Request $request, $id)
    {
        $file = $request->file('file');

        if ($file) {
            $studi = Studi::find($id);

            if ($studi) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/files', $fileName);

                $studi->file = $fileName;
                $studi->status = 1;
                $studi->save();
                Toastr::success('File RPS berhasil diupload', 'Sukses');
            }
        }
        return redirect()->back();
    }

    public function teacherReset($id)
    {
        $resetedStudi = Studi::findOrFail($id);
        $resetedStudi->status = 0;
        $resetedStudi->file = null;
        $resetedStudi->save();

        Toastr::success('Data prodi berhasil dihapus', 'Sukses');
        return redirect()->back();
    }

    public function teacherPesan()
    {
        $pesanList = Studi::where('status', 3)
        ->where('pesan', '!=', null)
        ->get();

        return view('teacher.pesan-teacher', compact('pesanList'));
    }
}

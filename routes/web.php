<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\ProdiController;
use App\Models\Rps;
use App\Http\Controllers\PublicController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', [PublicController::class, 'halamanPublik'])->name('publik');

// Mengarahkan ke halaman home/reporting setelah login berhasil
Route::group(['middleware' => ['auth']], function () {
    Route::get('home', function () {
        return redirect('student/reporting');
    });
    Route::get('/student/reporting', function () {
        return view('student/reporting/page');
    });
});

// ----------------------------publik ------------------------------//

Route::get('/publik', [PublicController::class, 'halamanPublik'])->name('publik');
Route::get('publik/detail/{id}', [PublicController::class, 'detailPublik'])->name('detail-publik');
Route::get('publik/detail/download/{id}', [PublicController::class, 'detailDownloadPublik'])->name('detail-download');



Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('/home/reporting', 'reporting')->middleware('auth')->name('home/reporting');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
});

// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ admin -------------------------------//
Route::controller(StudentController::class)->group(function () {
    Route::get('student/list', 'student')->middleware('auth')->name('student/list'); // list student
    Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page'); // page student
    Route::post('student/add/save', 'studentSave')->middleware('auth')->name('student/add/save'); // save record student
    Route::get('student/reporting/page', 'ReportingStudent')->middleware('auth')->name('student/reporting/page'); //reporting
    Route::get('student/monitoring/page', 'MonitoringStudent')->middleware('auth')->name('student/monitoring/page'); //monitoring
    Route::get('student/delete', 'studentDelete')->middleware('auth')->name('student/delete'); // delete RPS DOSEN PENGAJAR
    Route::get('student/reporting/detail/{id}', 'detailReporting')->middleware('auth')->name('student/reporting/detail'); //detail student
    Route::get('/students', [StudentController::class, 'index'])->middleware('auth')->name('students.index');
    Route::post('/student/get-prodi', [StudentController::class, 'getProdiByJurusan'])->middleware('auth')->name('student.getProdiByJurusan');
    Route::delete('/student-destroy/{id}', [TeacherController::class, 'destroy'])->middleware('auth')->name('student.destroy');
    Route::get('student/detail/download/{id}', 'detailDownload')->middleware('auth')->name('student/detail/download'); //download RPS
});

// ------------------------ pengajar -------------------------------//
Route::controller(TeacherController::class)->group(function () {
    Route::get('teacher/add/page/', 'teacherAdd')->middleware('auth')->name('teacher/add/page'); // page teacher
    Route::get('teacher/filtering/page/{id}', 'teacherFiltering')->middleware('auth')->name('teacher/filtering/page'); // page teacher
    Route::get('teacher/list/page', 'teacherList')->middleware('auth')->name('teacher/list/page'); // page teacher
    Route::post('teacher/save', 'saveRecord')->middleware('auth')->name('teacher/save'); // save record
    Route::get('teacher/edit/{id}', 'editRecord'); // view teacher record
    Route::post('teacher/update', 'updateRecordTeacher')->middleware('auth')->name('teacher/update'); // update record
    Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy'])->middleware('auth')->name('teacher.destroy'); // delete record
    Route::get('teacher-upload/{id}', [TeacherController::class, 'teacherUpload'])->middleware('auth')->name('teacher.upload'); // tombol upload
    Route::post('teacher-file/{id}', [TeacherController::class, 'teacherFile'])->middleware('auth')->name('teacher.file'); // upload file
    Route::get('teacher-reset/{id}', [TeacherController::class, 'teacherReset'])->middleware('auth')->name('teacher-reset'); // upload file
    Route::get('teacher/pesan/page', [TeacherController::class, 'teacherPesan'])->middleware('auth')->name('teacher-pesan'); //
});

// ----------------------- kajur -----------------------------//
Route::controller(DepartmentController::class)->group(function () {
    Route::get('department/add/page', 'indexDepartment')->middleware('auth')->name('department/add/page'); // page add department
    Route::get('department/edit/page', 'editDepartment')->middleware('auth')->name('department/edit/page'); // page add department
    Route::get('/department/detail-reporting/{id}', [DepartmentController::class, 'DetailReporting'])->middleware('auth')->name('department.detail-reporting'); //detail department
    Route::get('/department/detail-download/{id}', [DepartmentController::class, 'downloadReporting'])->middleware('auth')->name('department.detail-download');
});

// ----------------------- kaprodi -----------------------------//
Route::middleware('auth')->group(function () {
    Route::get('kaprodi/add/page', [KaprodiController::class, 'indexKaprodi'])->middleware('auth')->name('kaprodi/add/page');
    Route::get('kaprodi/dashboard/page', [KaprodiController::class, 'dashboardKaprodi'])->middleware('auth')->name('kaprodi/dashboard/page');
    Route::get('kaprodi/edit/page', [KaprodiController::class, 'editKaprodi'])->middleware('auth')->name('kaprodi/edit/page');
    Route::get('kaprodi/download/page/{id}', [KaprodiController::class, 'downloadKaprodi'])->middleware('auth')->name('kaprodi.download');
    Route::get('kaprodi/setuju/{id}', [KaprodiController::class, 'setujuKaprodi'])->middleware('auth')->name('kaprodi/setuju');
    Route::post('kaprodi/tolak/{id}', [KaprodiController::class, 'tolakKaprodi'])->middleware('auth')->name('kaprodi/tolak');
    Route::get('kaprodi/kirim_pesan/page', [KaprodiController::class, 'showKirimPesan'])->middleware('auth')->name('kaprodi-pesan');
});

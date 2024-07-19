<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adm\Prodicontroller;
use App\Http\Controllers\Adm\Fakultascontroller;
use App\Http\Controllers\Adm\Dashboardcontroller;
use App\Http\Controllers\Adm\Jenjangcontroller;
use App\Http\Controllers\Adm\Kelascontroller;
use App\Http\Controllers\Adm\Matakuliahcontroller;
use App\Http\Controllers\Adm\JenisJabatancontroller;
use App\Http\Controllers\Adm\JenisMatakuliahcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


///////////////////// Admin /////////////////////
//Authentication Login
Route::get('admin/login', [App\Http\Controllers\Auth\AuthAdminController::class, 'login'])->name('login');
Route::post('admin/authenticate', [App\Http\Controllers\Auth\AuthAdminController::class, 'authenticate'])->name('authenticate');
Route::post('admin/logout', [App\Http\Controllers\Auth\AuthAdminController::class, 'logout'])->name('logout');

//Dashboard Admin
Route::get('admin/dashboard', [Dashboardcontroller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/admin/dashboard')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {

    //Halaman Matakuliah
    Route::resource('matakuliah', Matakuliahcontroller::class);

    //Halaman Fakultas
    Route::controller(Fakultascontroller::class)->group(function () {
        Route::get('fakultas', 'index')->name('fakultas.index');
        Route::get('fakultas/create', 'create')->name('fakultas.create');
        Route::post('fakultas/store', 'store')->name('fakultas.store');
        Route::get('fakultas/{id}', 'show')->name('fakultas.show');
        Route::get('fakultas/{id}/edit', 'edit')->name('fakultas.edit');
        Route::put('fakultas/{id}', 'update')->name('fakultas.update');
        Route::delete('fakultas/delete/{id}', 'destroy')->name('fakultas.destroy');
        Route::get('fakultas-export', 'export')->name('fakultas.export');
        Route::get('fakultas-export-heading', 'exportheading')->name('fakultas.exportheading');
        Route::post('fakultas-import', 'import')->name('fakultas.import');
    });

    //Halaman Prodi
    Route::controller(Prodicontroller::class)->group(function () {
        Route::get('prodi', 'index')->name('prodi.index');
        Route::get('prodi/create', 'create')->name('prodi.create');
        Route::post('prodi/store', 'store')->name('prodi.store');
        Route::get('prodi/{id}', 'show')->name('prodi.show');
        Route::get('prodi/{id}/edit', 'edit')->name('prodi.edit');
        Route::put('prodi/{id}', 'update')->name('prodi.update');
        Route::delete('prodi/delete/{id}', 'destroy')->name('prodi.destroy');
        Route::get('prodi-export', 'export')->name('prodi.export');
        Route::get('prodi-export-heading', 'exportheading')->name('prodi.exportheading');
        Route::post('prodi-import', 'import')->name('prodi.import');
    });

    //Halaman Kelas
    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas', 'index')->name('kelas.index');
        Route::get('kelas/create', 'create')->name('kelas.create');
        Route::post('kelas/store', 'store')->name('kelas.store');
        Route::get('kelas/{id}', 'show')->name('kelas.show');
        Route::get('kelas/{id}/edit', 'edit')->name('kelas.edit');
        Route::put('kelas/{id}', 'update')->name('kelas.update');
        Route::delete('kelas/delete/{id}', 'destroy')->name('kelas.destroy');
        Route::get('kelas-export', 'export')->name('kelas.export');
        Route::get('kelas-export-heading', 'exportheading')->name('kelas.exportheading');
        Route::post('kelas-import', 'import')->name('kelas.import');
    });

    //Halaman Jenjang
    Route::controller(Jenjangcontroller::class)->group(function () {
        Route::get('jenjang', 'index')->name('jenjang.index');
        Route::get('jenjang/create', 'create')->name('jenjang.create');
        Route::post('jenjang/store', 'store')->name('jenjang.store');
        Route::get('jenjang/{id}', 'show')->name('jenjang.show');
        Route::get('jenjang/{id}/edit', 'edit')->name('jenjang.edit');
        Route::put('jenjang/{id}', 'update')->name('jenjang.update');
        Route::delete('jenjang/delete/{id}', 'destroy')->name('jenjang.destroy');
        Route::get('jenjang-export', 'export')->name('jenjang.export');
        Route::get('jenjang-export-heading', 'exportheading')->name('jenjang.exportheading');
        Route::post('jenjang-import', 'import')->name('jenjang.import');
    });
        //Halaman Jenjang
        Route::controller(JenisJabatancontroller::class)->group(function () {
            Route::get('jenisjabatan', 'index')->name('jenisjabatan.index');
            Route::get('jenisjabatan/create', 'create')->name('jenisjabatan.create');
            Route::post('jenisjabatan/store', 'store')->name('jenisjabatan.store');
            Route::get('jenisjabatan/{id}', 'show')->name('jenisjabatan.show');
            Route::get('jenisjabatan/{id}/edit', 'edit')->name('jenisjabatan.edit');
            Route::put('jenisjabatan/{id}', 'update')->name('jenisjabatan.update');
            Route::delete('jenisjabatan/delete/{id}', 'destroy')->name('jenisjabatan.destroy');
            Route::get('jenisjabatan-export', 'export')->name('jenisjabatan.export');
            Route::get('jenisjabatan-export-heading', 'exportheading')->name('jenisjabatan.exportheading');
            Route::post('jenisjabatan-import', 'import')->name('jenisjabatan.import');
        });
        //Halaman Jenis Matakuliah
        Route::controller(JenisMatakuliahcontroller::class)->group(function () {
            Route::get('jenismatakuliah', 'index')->name('jenismatakuliah.index');
            Route::get('jenismatakuliah/create', 'create')->name('jenismatakuliah.create');
            Route::post('jenismatakuliah/store', 'store')->name('jenismatakuliah.store');
            Route::get('jenismatakuliah/{id}', 'show')->name('jenismatakuliah.show');
            Route::get('jenismatakuliah/{id}/edit', 'edit')->name('jenismatakuliah.edit');
            Route::put('jenismatakuliah/{id}', 'update')->name('jenismatakuliah.update');
            Route::delete('jenismatakuliah/delete/{id}', 'destroy')->name('jenismatakuliah.destroy');
            Route::get('jenismatakuliah-export', 'export')->name('jenismatakuliah.export');
            Route::get('jenismatakuliah-export-heading', 'exportheading')->name('jenismatakuliah.exportheading');
            Route::post('jenismatakuliah-import', 'import')->name('jenismatakuliah.import');
        });
});





///////////////////// Admin Jurusan /////////////////////
//Authentication Login
Route::prefix('jurusan')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthJurusanController::class, 'login'])->name('jurusan.login');
    Route::post('/authenticate', [App\Http\Controllers\Auth\AuthJurusanController::class, 'authenticate'])->name('jurusan.authenticate');
    Route::middleware('auth:jurusan')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Auth\AuthJurusanController::class, 'dashboard'])->name('jurusan.dashboard');
        Route::post('/logout', [App\Http\Controllers\Auth\AuthJurusanController::class, 'logout'])->name('jurusan.logout');
    });
});

///////////////////// Dosen /////////////////////
//Authentication Login
Route::prefix('dosen')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthDosenController::class, 'login'])->name('dosen.login');
    Route::post('/authenticate', [App\Http\Controllers\Auth\AuthDosenController::class, 'authenticate'])->name('dosen.authenticate');
    Route::middleware('auth:dosen')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Auth\AuthDosenController::class, 'dashboard'])->name('dosen.dashboard');
        Route::post('/logout', [App\Http\Controllers\Auth\AuthDosenController::class, 'logout'])->name('dosen.logout');
    });
});

///////////////////// Mahasiswa /////////////////////
//Authentication Login
Route::prefix('mahasiswa')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\AuthMahasiswaController::class, 'login'])->name('mahasiswa.login');
    Route::post('/authenticate', [App\Http\Controllers\Auth\AuthMahasiswaController::class, 'authenticate'])->name('mahasiswa.authenticate');
    Route::middleware('auth:mahasiswa')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Auth\AuthMahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
        Route::post('/logout', [App\Http\Controllers\Auth\AuthMahasiswaController::class, 'logout'])->name('mahasiswa.logout');
    });
});

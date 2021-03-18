<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\LisensiController;
use App\Http\Controllers\MerkswController;
use App\Http\Controllers\MerkhwController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategorihwController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KondisiController;


Route::get('/', [HomeController::class, 'index']);

//CRUD Hardware:
Route::get('/hardware', [HardwareController::class, 'index'])->name('hardware');
Route::get('/hardware/detailhw/{id_hw}', [HardwareController::class, 'detail']);
Route::post('/hardware/inserthw', [HardwareController::class, 'insert']);
Route::get('/hardware/addhw', [HardwareController::class, 'add']);

//CRUD Software:
Route::get('/software', [SoftwareController::class, 'index'])->name('software');
Route::get('/software/detailsw/{id_sw}', [SoftwareController::class, 'detail']);
Route::post('/software/insertsw', [SoftwareController::class, 'insert']);
Route::get('/software/addsw', [SoftwareController::class, 'add']);

//CRUD Lisensi Software:
Route::get('/masterdata/lisensisw', [LisensiController::class, 'index'])->name('lisensi');
Route::post('/masterdata/lisensisw/insertlisensi', [LisensiController::class, 'insert']);

//CRUD Merk Software:
Route::get('/masterdata/merksw', [MerkswController::class, 'index'])->name('merksw');
Route::post('/masterdata/merksw/insertmerksw', [MerkswController::class, 'insert']);

//CRUD Merk Hardware:
Route::get('/masterdata/merkhw', [MerkhwController::class, 'index'])->name('merkhw');
Route::post('/masterdata/merkhw/insertmerkhw', [MerkhwController::class, 'insert']);
Route::post('/hardware/addhw/insertmerkinhw', [MerkhwController::class, 'insert2']);

//CRUD Ktegori Hardware:
Route::get('/masterdata/kategorihw', [KategorihwController::class, 'index'])->name('kategorihw');
Route::post('/masterdata/kategorihw/insertkategorihw', [KategorihwController::class, 'insert']);

//CRUD Lokasi Hardware:
Route::get('/masterdata/lokasi', [LokasiController::class, 'index'])->name('lokasi');
Route::post('/masterdata/lokasi/insertlokasi', [LokasiController::class, 'insert']);
//CRUD Departemen Hardware:
Route::get('/masterdata/departemen', [DepartemenController::class, 'index'])->name('departemen');
Route::post('/masterdata/departemen/insertdepartemen', [DepartemenController::class, 'insert']);
//CRUD staff Hardware:
Route::get('/masterdata/staff', [StaffController::class, 'index'])->name('staff');
Route::post('/masterdata/staff/insertstaff', [StaffController::class, 'insert']);

//CRUD Kondisi Hardware:
Route::get('/masterdata/kondisi', [KondisiController::class, 'index'])->name('kondisi');
Route::post('/masterdata/kondisi/insertkondisi', [KondisiController::class, 'insert']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    //Hak Akses Crud User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/updateuser/{id}', [UserController::class, 'update']);
    Route::get('/user/deleteuser/{id}', [UserController::class, 'delete']);
    
    //Hak Akses update+edit+delete Hardware 
    Route::post('/hardware/updatehw/{id_hw}', [HardwareController::class, 'update']);
    Route::get('/hardware/deletehw/{id_hw}', [HardwareController::class, 'delete']);
    Route::get('/hardware/edithw/{id_hw}', [HardwareController::class, 'edit']);
    
    //Hak Akses update+edit+delete Software
    Route::post('/software/updatesw/{id_sw}', [SoftwareController::class, 'update']);
    Route::get('/software/deletesw/{id_sw}', [SoftwareController::class, 'delete']);
    Route::get('/software/editsw/{id_sw}', [SoftwareController::class, 'edit']);
    
    //Hak Akses update+delete Lisensi Software
    Route::post('/masterdata/lisensisw/updatelisensi/{id_jenis_lisensi}', [LisensiController::class, 'update']);
    Route::get('/masterdata/lisensisw/deletelisensi/{id_jenis_lisensi}', [LisensiController::class, 'delete']);
    
    //Hak Akses update+delete Merk Software
    Route::post('/masterdata/merksw/updatemerksw/{id_merk_sw}', [MerkswController::class, 'update']);
    Route::get('/masterdata/merksw/deletemerksw/{id_merk_sw}', [MerkswController::class, 'delete']);
    
    //Hak Akses update+delete Merk Hardware
    Route::post('/masterdata/merkhw/updatemerkhw/{id_merk_hw}', [MerkhwController::class, 'update']);
    Route::get('/masterdata/merkhw/deletemerkhw/{id_merk_hw}', [MerkhwController::class, 'delete']);
    
    //Hak Akses update+delete Kategori Hardware
    Route::post('/masterdata/kategorihw/updatekategorihw/{id_kategori_hw}', [KategorihwController::class, 'update']);
    Route::get('/masterdata/kategorihw/deletekategorihw/{id_kategori_hw}', [KategorihwController::class, 'delete']);
    
    //Hak Akses update+delete Lokasi Hardware
    Route::post('/masterdata/lokasi/updatelokasi/{id_lokasi}', [LokasiController::class, 'update']);
    Route::get('/masterdata/lokasi/deletelokasi/{id_lokasi}', [LokasiController::class, 'delete']);
    
    //Hak Akses update+delete Departemen Hardware
    Route::post('/masterdata/departemen/updatedepartemen/{id_departemen}', [DepartemenController::class, 'update']);
    Route::get('/masterdata/departemen/deletedepartemen/{id_departemen}', [DepartemenController::class, 'delete']);
    
    //Hak Akses update+delete Staff Hardware
    Route::post('/masterdata/staff/updatestaff/{id_staff}', [StaffController::class, 'update']);
    Route::get('/masterdata/staff/deletestaff/{id_staff}', [StaffController::class, 'delete']);
    
    //Hak Akses update+delete Kondisi Hardware
    Route::post('/masterdata/kondisi/updatekondisi/{id_kondisi}', [KondisiController::class, 'update']);
    Route::get('/masterdata/kondisi/deletekondisi/{id_kondisi}', [KondisiController::class, 'delete']);
  
});

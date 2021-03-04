<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\LisensiController;
use App\Http\Controllers\MerkswController;
use App\Http\Controllers\PemakaiController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/hardware', [HardwareController::class, 'index'])->name('hardware');
Route::get('/hardware/detailhw/{id_hw}', [HardwareController::class, 'detail']);
Route::get('/hardware/addhw', [HardwareController::class, 'add']);
Route::post('/hardware/inserthw', [HardwareController::class, 'insert']);
Route::get('/hardware/edithw/{id_hw}', [HardwareController::class, 'edit']);
Route::post('/hardware/updatehw/{id_hw}', [HardwareController::class, 'update']);
Route::get('/hardware/deletehw/{id_hw}', [HardwareController::class, 'delete']);
    // Route::get('/hardware', [HardwareController::class, 'getHardware'])->name('allData');
    Route::get('/hardware/workstations/', [HardwareController::class, 'atWorkstations'])->name('workstations');
    Route::get('/hardware/detailhw/{id_hw}', [HardwareController::class, 'detail']);

//CRUD Software:
Route::get('/software', [SoftwareController::class, 'index'])->name('software');
Route::get('/software/detailsw/{id_sw}', [SoftwareController::class, 'detail']);
Route::get('/software/addsw', [SoftwareController::class, 'add']);
Route::post('/software/insertsw', [SoftwareController::class, 'insert']);
Route::get('/software/editsw/{id_sw}', [SoftwareController::class, 'edit']);
Route::post('/software/updatesw/{id_sw}', [SoftwareController::class, 'update']);
Route::get('/software/deletesw/{id_sw}', [SoftwareController::class, 'delete']);

//CRUD Lisensi Software:
Route::get('/masterdata/lisensisw', [LisensiController::class, 'index'])->name('lisensi');
Route::post('/masterdata/lisensisw/insertlisensi', [LisensiController::class, 'insert']);
Route::post('/masterdata/lisensisw/updatelisensi/{id_jenis_lisensi}', [LisensiController::class, 'update']);
Route::get('/masterdata/lisensisw/deletelisensi/{id_jenis_lisensi}', [LisensiController::class, 'delete']);

//CRUD Merk Software:
Route::get('/masterdata/merksw', [MerkswController::class, 'index'])->name('merksw');
Route::post('/masterdata/merksw/insertmerksw', [MerkswController::class, 'insert']);
Route::post('/masterdata/merksw/updatemerksw/{id_merk_sw}', [MerkswController::class, 'update']);
Route::get('/masterdata/merksw/deletemerksw/{id_merk_sw}', [MerkswController::class, 'delete']);



Route::get('/user/index/', [UserController::class, 'index']);

Route::get('/pemakai', [PemakaiController::class, 'index']);

route::view('/apalah','v_apalah');

// route::view('/hardware/workstations/','hardware.v_workstations');
// route::view('/hardware/server/','hardware.v_server');
// route::view('/hardware/printer/','hardware.v_printer');
// route::view('/hardware/sparepart/','hardware.v_sparepart');
// route::view('/hardware/other/','hardware.v_other');

// route::view('/software/subscription/','software.v_subscription');
// route::view('/software/sekalibayar/','software.v_sekalibayar');

// route::view('/user/admin/','user.v_admin');
// route::view('/user/staff/','user.v_staff');

// route::view('/pemakai','v_pemakai');

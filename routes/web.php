<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApkBoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\WebPromosiController;
use App\Http\Controllers\SpinnerVoucherController;
use App\Http\Controllers\SpinnerJenisvoucherController;
use App\Http\Controllers\SpinnerGeneratevoucherController;
use App\Http\Controllers\LoginSpinnerController;





Route::get('/', function () {

    if (Auth::check()) {
        $user = Auth::user();


        if ($user->divisi == 'superadmin') {
            return redirect()->intended('/superadmin');
        } elseif ($user->divisi == 'spinner') {
            return redirect()->intended('/spinner');
        } else {
            return redirect()->intended('http://127.0.0.1:8000/login');
        }
    }

    return redirect()->intended('http://127.0.0.1:8000/login');
});

Route::get('/superadmin', function () {
    return view('dashboard.superadmin.superadmin', [
        'title' => 'superadmin',
    ]);
})->Middleware(['auth', 'superadmin']);

Route::get('/spinner', function () {
    return view('dashboard.dashboard', [
        'title' => 'SPINNER',
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->Middleware('auth');


Route::get('/trex1diath/register', [RegisterController::class, 'index']);
Route::post('/trex1diath/register', [RegisterController::class, 'store']);

/*------------------------------------- APK -------------------------------------*/

/*-- Bo --*/
Route::get('/apk/bo', [ApkBoController::class, 'index'])->Middleware(['auth', 'apk']);
Route::get('apk/bo/data/{id}', [ApkBoController::class, 'data'])->Middleware(['auth', 'apk']);
Route::post('/apk/bo/create', [ApkBoController::class, 'store'])->Middleware(['auth', 'apk']);
Route::put('/apk/bo/update/{id}', [ApkBoController::class, 'update'])->Middleware(['auth', 'apk']);
Route::delete('/apk/bo/delete/{id}', [ApkBoController::class, 'destroy'])->Middleware(['auth', 'apk']);


/*------------------------------------- SUPERADMIN -------------------------------------*/
/*-- Dshboard --*/
Route::resource('/superadmins/usertrexdiat', SuperAdminController::class)->Middleware(['auth', 'superadmin']);
Route::post('/superadmins/usertrexdiat/{post:id}', [SuperAdminController::class, 'show'])->Middleware(['auth', 'superadmin']);
Route::post('/web/promosi/deleteimage', [WebPromosiController::class, 'deleteimage'])->name('deleteimage')->Middleware(['auth', 'apk']);




/*-- Voucher --*/
Route::get('spinner/voucher/{id}/{api?}', [SpinnerVoucherController::class, 'index'])->name('spinner.voucher');
Route::get('spinner/voucherindex/{api?}', [SpinnerVoucherController::class, 'index2'])->name('spinner.voucherindex');
Route::get('spinner/voucher/data/{id}', [SpinnerVoucherController::class, 'data']);
Route::get('spinner/voucher/datapromosi/{id}', [SpinnerVoucherController::class, 'datapromosi']);
Route::post('spinner/voucher/create', [SpinnerVoucherController::class, 'store']);
Route::put('spinner/voucher/update/{id}', [SpinnerVoucherController::class, 'update']);
Route::delete('spinner/voucher/delete/{id}', [SpinnerVoucherController::class, 'destroy']);
Route::get('spinner/voucher/export/{id}', [SpinnerVoucherController::class, 'export'])->name('spinner.voucher.export');
Route::post('spinner/voucher/update-status/{id}', [SpinnerVoucherController::class, 'updateStatus'])->name('spinner.update-status');

/*-- Jenis Voucher --*/
Route::get('spinner/jenisvoucher', [SpinnerJenisvoucherController::class, 'index']);
Route::post('spinner/jenisvoucher/create', [SpinnerJenisvoucherController::class, 'store']);
Route::get('spinner/jenisvoucher/data/{id}', [SpinnerJenisvoucherController::class, 'data']);
Route::post('spinner/jenisvoucher/create', [SpinnerJenisvoucherController::class, 'store']);
Route::put('spinner/jenisvoucher/update/{id}', [SpinnerJenisvoucherController::class, 'update']);
Route::delete('spinner/jenisvoucher/delete/{id}', [SpinnerJenisvoucherController::class, 'destroy']);

Route::get('spinner/jenisvoucher/datapromosi/{id}', [SpinnerJenisvoucherController::class, 'datapromosi']);
Route::get('spinner/jenisvoucher/datavoucher/', [SpinnerJenisvoucherController::class, 'datavoucher']);


/*-- Link --*/
// Route::get('spinner/jenisvoucher', [ApkLinkController::class, 'index'])->Middleware(['auth', 'apk']);
// Route::get('spinner/jenisvoucher/data/{id}', [ApkLinkController::class, 'data'])->Middleware(['auth', 'apk']);
// Route::post('spinner/jenisvoucher/create', [ApkLinkController::class, 'create'])->Middleware(['auth', 'apk']);
// Route::post('spinner/jenisvoucher/update/{id}', [ApkLinkController::class, 'update'])->Middleware(['auth', 'apk']);
// Route::delete('spinner/jenisvoucher/delete/{id}', [ApkLinkController::class, 'delete'])->Middleware(['auth', 'apk']);




/*-- Generate Voucher --*/
Route::get('spinner/generatevoucher', [SpinnerGeneratevoucherController::class, 'index'])->name('spinner.generatevoucher');
Route::get('spinner/generatevoucher/data/{id}', [SpinnerGeneratevoucherController::class, 'data']);
Route::get('spinner/generatevoucher/datapromosi/{id}', [SpinnerGeneratevoucherController::class, 'datapromosi']);
Route::post('spinner/generatevoucher/create', [SpinnerGeneratevoucherController::class, 'store']);
Route::put('spinner/generatevoucher/update/{id}', [SpinnerGeneratevoucherController::class, 'update']);
Route::delete('spinner/generatevoucher/delete/{id}', [SpinnerGeneratevoucherController::class, 'destroy']);


/*------------------------------------- SPINNER -------------------------------------*/

Route::get('spinner/voucher/exportexcel/{id}', [SpinnerVoucherController::class, 'exportexcel'])->name('spinner.voucher.exportexcel');


Route::get('k6rilog19', function () {
    return view('spinlg.index');
});

Route::get('spinnerl21', function () {
    return view('spinlg.spinner');
});


Route::post('spinner/auth', [LoginSpinnerController::class, 'authenticate']);

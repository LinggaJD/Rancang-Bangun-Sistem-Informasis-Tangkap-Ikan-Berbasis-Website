<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth
Route::get('/login','AuthController@index')->name('auth.index');
Route::post('/login','AuthController@process')->name('auth.process');
Route::get('/logout','AuthController@logout')->name('auth.logout');

Route::get('/home','AuthController@home')->name('auth.home');
Route::get('/contact','AuthController@contact')->name('auth.contact');
// Route::get('/faq','AuthController@faq')->name('auth.faq');
Route::get('/grafik','AuthController@grafik')->name('auth.grafik');

// User
Route::group(['middleware' => 'login_auth:admin,user'], function () {
    Route::get('/account','UserController@index')->name('account');

    // Penangkapan
    Route::get('/account/penangkapan/export','UserController@penangkapan_export')->name('account.penangkapan.export');
    Route::get('/account/penangkapan','UserController@penangkapan')->name('account.penangkapan');
    Route::get('/account/penangkapan/detail/{penangkapan}','UserController@penangkapan_show')->name('account.penangkapan.show');
    Route::get('/account/penangkapan/tambah','UserController@penangkapan_create')->name('account.penangkapan.create');
    Route::post('/account/penangkapan/tambah','UserController@penangkapan_store')->name('account.penangkapan.store');
    Route::get('/account/penangkapan/edit/{penangkapan}','UserController@penangkapan_edit')->name('account.penangkapan.edit');
    Route::put('/account/penangkapan/edit/{penangkapan}','UserController@penangkapan_update')->name('account.penangkapan.update');
    Route::get('/account/penangkapan/hapus/{penangkapan}','UserController@penangkapan_destroy')->name('account.penangkapan.destroy');

    // Profile
    Route::get('/account/profile','UserController@profile')->name('account.profile');
    Route::get('/account/profile/pass','UserController@profile_pass')->name('account.profile.pass');
    Route::put('/account/profile/pass/{user}','UserController@profile_pass_act')->name('account.profile.pass.act');

    // Laporan
    Route::get('/account/laporan','UserController@laporan')->name('account.laporan');
    Route::get('/account/laporan/tambah','UserController@laporan_create')->name('account.laporan.create');
    Route::post('/account/laporan/tambah','UserController@laporan_store')->name('account.laporan.store');
    Route::get('/account/laporan/edit/{id}','UserController@laporan_edit')->name('account.laporan.edit');
    Route::put('/account/laporan/edit/{id}','UserController@laporan_update')->name('account.laporan.update');
    Route::get('/account/laporan/del/{id}','UserController@laporan_destroy')->name('account.laporan.destroy');
});

// Admin
Route::group(['middleware' => 'login_auth:admin'], function () {
    Route::get('/','AdminController@index')->name('index');
    // Jenis Alat Penangkap
    Route::get('/jenis/alat/penangkap','AdminController@jenis_alat_penangkap')->name('jenis.alat.penangkap');
    Route::get('/jenis/alat/penangkap/tambah','AdminController@jenis_alat_penangkap_create')->name('jenis.alat.penangkap.create');
    Route::post('/jenis/alat/penangkap/tambah','AdminController@jenis_alat_penangkap_store')->name('jenis.alat.penangkap.store');
    Route::get('/jenis/alat/penangkap/edit/{jenis_alat_penangkap}','AdminController@jenis_alat_penangkap_edit')->name('jenis.alat.penangkap.edit');
    Route::put('/jenis/alat/penangkap/edit/{jenis_alat_penangkap}','AdminController@jenis_alat_penangkap_update')->name('jenis.alat.penangkap.update');
    Route::get('/jenis/alat/penangkap/hapus/{jenis_alat_penangkap}','AdminController@jenis_alat_penangkap_destroy')->name('jenis.alat.penangkap.destroy');
    // Jenis Ikan
    Route::get('/jenis/ikan','AdminController@jenis_ikan')->name('jenis.ikan');
    Route::get('/jenis/ikan/tambah','AdminController@jenis_ikan_create')->name('jenis.ikan.create');
    Route::post('/jenis/ikan/tambah','AdminController@jenis_ikan_store')->name('jenis.ikan.store');
    Route::get('/jenis/ikan/edit/{jenisikan}','AdminController@jenis_ikan_edit')->name('jenis.ikan.edit');
    Route::put('/jenis/ikan/edit/{jenisikan}','AdminController@jenis_ikan_update')->name('jenis.ikan.update');
    Route::get('/jenis/ikan/hapus/{jenisikan}','AdminController@jenis_ikan_destroy')->name('jenis.ikan.destroy');
    // Jenis Kapal
    Route::get('/jenis/kapal','AdminController@jenis_kapal')->name('jenis.kapal');
    Route::get('/jenis/kapal/tambah','AdminController@jenis_kapal_create')->name('jenis.kapal.create');
    Route::post('/jenis/kapal/tambah','AdminController@jenis_kapal_store')->name('jenis.kapal.store');
    Route::get('/jenis/kapal/edit/{jeniskapal}','AdminController@jenis_kapal_edit')->name('jenis.kapal.edit');
    Route::put('/jenis/kapal/edit/{jeniskapal}','AdminController@jenis_kapal_update')->name('jenis.kapal.update');
    Route::get('/jenis/kapal/hapus/{jeniskapal}','AdminController@jenis_kapal_destroy')->name('jenis.kapal.destroy');

    // Kecamatan
    Route::get('/kecamatan','AdminController@kecamatan')->name('kecamatan');
    Route::get('/kecamatan/tambah','AdminController@kecamatan_create')->name('kecamatan.create');
    Route::post('/kecamatan/tambah','AdminController@kecamatan_store')->name('kecamatan.store');
    Route::get('/kecamatan/edit/{kecamatan}','AdminController@kecamatan_edit')->name('kecamatan.edit');
    Route::put('/kecamatan/edit/{kecamatan}','AdminController@kecamatan_update')->name('kecamatan.update');
    Route::get('/kecamatan/hapus/{kecamatan}','AdminController@kecamatan_destroy')->name('kecamatan.destroy');

    // Penangkapan
    Route::get('/penangkapan/export','AdminController@penangkapan_export')->name('penangkapan.export');
    Route::get('/penangkapan','AdminController@penangkapan')->name('penangkapan');
    Route::get('/penangkapan/detail/{penangkapan}','AdminController@penangkapan_show')->name('penangkapan.show');
    Route::get('/penangkapan/report','AdminController@report_penangkapan')->name('penangkapan.report');
    Route::get('/penangkapan/report/range','AdminController@report_penangkapan_range')->name('penangkapan.report.range');

    Route::get('/penangkapan/edit/{penangkapan}','AdminController@penangkapan_edit')->name('penangkapan.edit');
    Route::put('/penangkapan/edit/{penangkapan}','AdminController@penangkapan_update')->name('penangkapan.update');
    Route::get('/penangkapan/hapus/{penangkapan}','AdminController@penangkapan_destroy')->name('penangkapan.destroy');
    // User
    Route::get('/user','AdminController@user')->name('user');
    Route::get('/user/admin','AdminController@user_admin')->name('user.admin');
    Route::get('/user/tambah','AdminController@user_create')->name('user.create');
    Route::post('/user/tambah','AdminController@user_store')->name('user.store');
    Route::get('/user/hapus/{user}','AdminController@user_destroy')->name('user.destroy');
    Route::get('/user/edit/{user}','AdminController@user_edit')->name('user.edit');
    Route::put('/user/edit/{user}','AdminController@user_update')->name('user.update');
    Route::get('/user/detail/{user}','AdminController@user_show')->name('user.show');
    Route::get('/user/pass/{user}','AdminController@user_pass')->name('user.pass');
    Route::put('/user/pass/{user}','AdminController@user_pass_act')->name('user.pass.act');

    // Laporan
    Route::get('/laporan','AdminController@laporan')->name('laporan');

    // Pengumuman
    Route::post('/pengumuman/edit','AdminController@pengumuman_edit')->name('pengumuman.edit');


    // Export Produksi Ikan
    Route::get('/jenis/kapal/export','AdminController@jenis_kapal_export')->name('jenis.kapal.export');
    Route::get('/alat/penangkap/ikan/export','AdminController@jenis_alat_penangkap_export')->name('jenis.alat.penangkap.export');
    Route::get('/jenis/ikan/export','AdminController@jenis_ikan_export')->name('jenis.ikan.export');

    // Export Laporan
    Route::get('/laporan/export','AdminController@laporan_export')->name('laporan.export');

    // Import Jenis Kapal
    Route::get('/jenis/kapal/form','AdminController@jenis_kapal_form')->name('jenis.kapal.form');
    Route::post('/jenis/kapal/import','AdminController@jenis_kapal_import')->name('jenis.kapal.import');
    // Import Alat Penangkap Ikan
    Route::get('/alat/penangkap/ikan/form','AdminController@alat_penangkap_ikan_form')->name('alat.penangkap.form');
    Route::post('/alat/penangkap/ikan/import','AdminController@alat_penangkap_import')->name('alat.penangkap.import');
    // Import Jenis Ikan
    Route::get('/jenis/ikan/form','AdminController@jenis_ikan_form')->name('jenis.ikan.form');
    Route::post('/jenis/ikan/import','AdminController@jenis_ikan_import')->name('jenis.ikan.import');
});






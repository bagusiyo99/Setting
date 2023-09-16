<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\BerandaOperatorController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\admin\AdminAbout;
use App\Http\Controllers\admin\AdminAuth;
use App\Http\Controllers\admin\AdminBanner;
use App\Http\Controllers\admin\AdminBlog;
use App\Http\Controllers\admin\AdminDasboard;
use App\Http\Controllers\admin\AdminInformasi;
use App\Http\Controllers\admin\AdminPendaftaran;
use App\Http\Controllers\admin\AdminPesan;
use App\Http\Controllers\admin\AdminFormulir;
use App\Http\Controllers\admin\AdminFoto;
use App\Http\Controllers\admin\AdminGuru;
use App\Http\Controllers\admin\AdminJurusan;
use App\Http\Controllers\admin\AdminKepsek;
use App\Http\Controllers\AdminDaftarOnline;
use App\Http\Controllers\AdminKomen;
use App\Http\Controllers\AdminSiswa;
use App\Http\Controllers\home\Home;
use App\Http\Controllers\home\HomeBlog;
use App\Http\Controllers\home\HomeContact;
use App\Http\Controllers\home\HomeDaftarOnline;
use App\Http\Controllers\home\HomeFoto;
use App\Http\Controllers\home\HomeGuru;
use App\Http\Controllers\home\HomeJurusan;
use App\Http\Controllers\home\HomeKepsek;
use App\Http\Controllers\home\HomePendaftaran;
use App\Http\Controllers\home\komenController;
use App\Http\Controllers\home\Kwitansi;
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

Route::get('/', [Home::class, 'index']);
Route::get('/detail/{id}', [Home::class, 'detail'])->name('home.detail');
Route::get('/informasi/{id}', [Home::class, 'informasi']);


Route::get('/formulir', [Home::class, 'formulir']);

Route::get('/foto', [HomeFoto::class, 'index']);
Route::get('/galeri/{id}', [HomeFoto::class,'detail'])->name('foto.detail');

Route::get('/guru', [HomeGuru::class, 'index']);
Route::get('/detail/{id}', [HomeGuru::class,'detail'])->name('guru.detail');

Route::get('/jurusan', [HomeJurusan::class, 'index']);
// Route::get('/show/{id}', [HomeJurusan::class,'detail']);
Route::get('/jurusan/{id}', [HomeJurusan::class, 'detail'])->name('jurusan.detail');

Route::get('/kepsek', [HomeKepsek::class, 'index']);
Route::get('/show/{id}', [HomeKepsek::class,'detail'])->name('kepsek.detail');


//  Route::resource('/komen', HomeBlog::class);

// Rute untuk pencarian
// Route::get('/blogs/search', [PencarianController::class, 'search'])->name('blog.search');


Route::get('/daftar', [HomeDaftar::class, 'index']);
Route::post('/daftar/send', [HomeDaftar::class, 'send']);

Route::get('/contact', [HomeContact::class, 'index']);
Route::post('/contact/send', [HomeContact::class, 'send']);



// komentar blog atau artikel
Route::get('/blog', [HomeBlog::class, 'blog'])->name('blog.index');
// Route to display a specific blog post and its comments
Route::get('/blog/{id}', [HomeBlog::class, 'detailBlog'])->name('blog.detail');
// Rute untuk menampilkan formulir input komentar
Route::get('/komentar', [KomenController::class, 'comen'])->name('komentar.comen');

// Rute untuk menyimpan komentar
Route::post('/komentar/send', [KomenController::class, 'send'])->name('komentar.send');
// akhir komentar blog atau artikel


// daftar ulang
Route::get('/daftar_online', [HomeDaftarOnline::class, 'index']);
Route::post('/daftar_online/send', [HomeDaftarOnline::class, 'send']);
// akhir daftar ulang


Route::get('/pendaftaran-export', [AdminPendaftaran::class, 'export']);
Route::get('/daftar_online-export', [AdminDaftarOnline::class, 'export']);


// pendaftaran
Route::middleware('check.pendaftar.limit')->group(function () {
Route::get('/pendaftaran', [HomePendaftaran::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran/send', [HomePendaftaran::class, 'send'])->name('pendaftaran.send');
});

Route::get('/download-kwitansi/{nama}', [HomePendaftaran::class, 'downloadKwitansi'])->name('pendaftaran.downloadKwitansi');
// akhir pendaftaran

 // Rute untuk menghapus semua pendaftaran di admin
    Route::get('/hapus-semua-pendaftaran', [AdminPendaftaran::class, 'hapusSemuaPendaftaran'])->name('operator.hapus-semua-pendaftaran');


Route::get('/about', function () {
    $data = [
        'content'=> 'home/about/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/sukses', function () {
    $data = [
        'content'=> 'home/sukses/index'
    ];
    return view('home.layouts.wrapper',$data);
});


Route::get('/penuh', function () {
    $data = [
        'content'=> 'home/penuh/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/full', function () {
    $data = [
        'content'=> 'home/full/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/home', function () {
    $data = [
        'content'=> 'home/home/index'
    ];
    return view('home.layouts.wrapper',$data);
});


Route::get('/alamat', function () {
    $data = [
        'content'=> 'home/alamat/index'
    ];
    return view('home.layouts.wrapper',$data);
});

Route::get('/prosedur', function () {
    $data = [
        'content'=> 'home/prosedur/index'
    ];
    return view('home.layouts.wrapper',$data);
});

   

Route::get('/home', function () {
 return redirect();
});

Auth::routes();
    // Route::put('/about/update', AdminAbout::class, 'update');
    // Route::get('/about', AdminAbout::class, 'index');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function(){
    
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');


        Route::get('/about', [AdminAbout::class, 'index'])->name('about.index');
        Route::put('/about/update', [AdminAbout::class, 'update']);


    // Rute resource untuk pendaftaran
    // Route::resource('/pendaftaran', 'App\Http\Controllers\admin\AdminPendaftaran');

    Route::resource('/about', AdminAbout::class);

    Route::resource('/pesan', AdminPesan::class);
    Route::resource('/komen', AdminKomen::class);

    Route::resource('/pendaftaran', AdminPendaftaran::class);

    Route::resource('setting', SettingController::class);

    Route::resource('/siswa1', AdminSiswa::class);
    Route::resource('/daftar_online', AdminDaftarOnline::class);
    Route::resource('/banner', AdminBanner::class);
    Route::resource('/informasi', AdminInformasi::class);
    Route::resource('/blog', AdminBlog::class);
    Route::resource('/formulir', AdminFormulir::class);
    Route::resource('/foto', AdminFoto::class);
    Route::resource('/guru', AdminGuru::class);
    Route::resource('/jurusan', AdminJurusan::class);
    Route::resource('/kepsek', AdminKepsek::class);

});




Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');




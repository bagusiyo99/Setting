<?php


use App\Http\Controllers\home\Home;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\home\HomeJasa;
use App\Http\Controllers\admin\AdminBlog;
use App\Http\Controllers\admin\AdminJasa;
use App\Http\Controllers\admin\AdminKomen;



use App\Http\Controllers\admin\AdminBanner;
use App\Http\Controllers\home\HomePemesanan;
use App\Http\Controllers\home\HomePortofolio;
use App\Http\Controllers\admin\AdminPemesanan;
use App\Http\Controllers\home\komenController;
use App\Http\Controllers\admin\AdminPengaturan;
use App\Http\Controllers\admin\AdminPortofolio;
use App\Http\Controllers\home\HomeBlogController;
use App\Http\Controllers\admin\BerandaOperatorController;
use App\Http\Controllers\SettingController;

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


Route::get('/portofolio', [HomePortofolio::class, 'index'])->name('portofolio.index');
Route::get('/portofolio/{id}', [HomePortofolio::class, 'detail'])->name('portofolio.detail');

Route::get('/jasa', [HomeJasa::class, 'index'])->name('jasa.index');
Route::get('/jasa/{id}', [HomeJasa::class, 'detail'])->name('jasa.detail');


Route::get('/pemesanan', [HomePemesanan::class, 'index'])->name('pemesanan.index');
Route::post('/pemesanan/send', [HomePemesanan::class, 'send'])->name('pemesanan.send');



Route::get('/blog', [HomeBlogController::class, 'blog'])->name('blog.index');
Route::get('/blog/{id}', [HomeBlogController::class, 'detailBlog'])->name('blog.detail');
Route::get('/komentar', [KomenController::class, 'comen'])->name('komentar.comen');
Route::get('/search', [HomeBlogController::class, 'search'])->name('blog.search');

// Rute untuk menyimpan komentar
Route::post('/komentar/send', [KomenController::class, 'send'])->name('komentar.send')->middleware('web');
// akhir komentar blog atau artikel















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




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function(){
    
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');


        Route::get('/pengaturan', [AdminPengaturan::class, 'index'])->name('pengaturan.index');
        Route::put('/pengaturan/update', [AdminPengaturan::class, 'update'])->name('pengaturan.update');



    Route::resource('setting', SettingController::class);
    Route::resource('/pemesanan', AdminPemesanan::class);
    Route::resource('/komen', AdminKomen::class);
    Route::resource('/jasa', AdminJasa::class);
    Route::resource('/banner', AdminBanner::class);
    Route::resource('/blog', AdminBlog::class);
    Route::resource('/portofolio', AdminPortofolio::class);

});




Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
})->name('logout');




<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KeanggotaanController;
use App\Http\Controllers\BebasPustakaController;
use App\Http\Controllers\BibliographyController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PerpanjanganController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\KoleksiDigitalController;
use App\Http\Controllers\DashboardAuthorController;
use App\Http\Controllers\DashboardPinjamController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardContactController;
use App\Http\Controllers\DashboardKatalogController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPeminjamanController;
use App\Http\Controllers\DashboardBibliographyController;
use App\Http\Controllers\DashboardPengembalianController;
use App\Http\Controllers\DashboardPerpanjanganController;
use App\Http\Controllers\DashboardKoleksiDigitalController;
use App\Http\Controllers\DashboardPenelusuranKatalogController;

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

Route::get('/', [HomeController::class, 'index']);
//Home-Sirkulasi
Route::resource('/home/sirkulasi/peminjaman-buku', PeminjamanController::class)->except('show')->middleware('admin'); 
Route::resource('/home/sirkulasi/pengembalian-buku', PengembalianController::class)->except('show')->middleware('admin');
Route::get('/home/sirkulasi/penelusuran-katalog', [KatalogController::class, 'index']);
Route::get('/home/sirkulasi/penelusuran-katalog/detail/{katalog:slug}', [KatalogController::class, 'show']);
Route::put('/home/sirkulasi/ajukan-perpanjangan/{peminjaman:slug}', [PerpanjanganController::class, 'perpanjangan']);
Route::get('/home/sirkulasi/penelusuran-katalog/{katalog:slug}', [KatalogController::class, 'pinjam']);
// Route::resource('/home/sirkulasi/bebaspustaka/', BebasPustakaController::class)->except('show')->middleware('admin');
Route::get('/home/sirkulasi/bebas-pustaka/', [BebasPustakaController::class, 'pustaka']);
//Home-Layanan
Route::resource('/home/layanan/keanggotaan', KeanggotaanController::class)->except('show')->middleware('admin');
Route::get('/home/layanan/keanggotaan/cetak-kartu', [KeanggotaanController::class, 'cetak']);
Route::get('/home/layanan/bibliographies', [BibliographyController::class, 'index']);
Route::get('/home/layanan/bibliographies/detail/{katalog:slug}', [KatalogController::class, 'showbiblio']);
Route::get('/home/layanan/bibliographies/{katalog:slug}', [KatalogController::class, 'pinjam']);
//Home-Koleksi-Digital
Route::get('/home/koleksi-digital', [KoleksiDigitalController::class, 'index']);
Route::get('/home/koleksi-digital/detail/{koleksidigital:slug}', [KoleksiDigitalController::class, 'show']);
Route::get('/home/koleksi-digital/read/{koleksidigital:slug}', [KoleksiDigitalController::class, 'baca']);
//Contact
Route::get('/contact-us', [ContactController::class, 'showForm']);
Route::post('/contact-us', [ContactController::class, 'send'])->name('send.email');


//SIGN IN
Route::get('/sign-in', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//SIGN UP
Route::get('/sign-up', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/sign-up', [RegisterController::class, 'store']);


//DASHBOARD
// Auth::routes();
Route::middleware(['auth', 'role:admin|admin'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    //ROLE
    // Route::get('/dashboard/roles/checkSlug', [RoleController::class, 'checkSlug']);
    Route::resource('/dashboard/roles', RoleController::class);
    
    //Penulis
    Route::get('/dashboard/authors/checkSlug', [DashboardAuthorController::class, 'checkSlug']);
    Route::resource('/dashboard/authors', DashboardAuthorController::class);
    
    //HERO
    Route::get('/dashboard/heroes/checkSlug', [HeroController::class, 'checkSlug']);
    Route::resource('/dashboard/heroes', HeroController::class);
    
    //Informasi
    Route::get('/dashboard/informasi/checkSlug', [InformasiController::class, 'checkSlug']);
    Route::resource('/dashboard/informasi', InformasiController::class);
    
    //Penelusuran Katalog
    Route::get('/dashboard/sirkulasi/katalogs/checkSlug', [DashboardKatalogController::class, 'checkSlug']);
    Route::resource('/dashboard/sirkulasi/katalogs', DashboardKatalogController::class);
    Route::resource('/dashboard/sirkulasi/penelusuran-katalog', DashboardPenelusuranKatalogController::class);
    
    //Koleksi Digital
    Route::get('/dashboard/koleksidigitals/checkSlug', [DashboardKoleksiDigitalController::class, 'checkSlug']);
    Route::resource('/dashboard/koleksidigitals', DashboardKoleksiDigitalController::class);
    
    //Bibliography
    Route::get('/dashboard/layanan/bibliography/checkSlug', [DashboardBibliographyController::class, 'checkSlug']);
    Route::resource('/dashboard/layanan/bibliography', DashboardBibliographyController::class);
    
    //Contact-us
    Route::get('/dashboard/contact-us', [DashboardContactController::class, 'index']);
     
    //Ajuan Perpanjangan
    Route::resource('/dashboard/ajuan-perpanjangan', DashboardPerpanjanganController::class);
    Route::put('/dashboard/ajuan-ditolak/{peminjaman:slug}', [DashboardPerpanjanganController::class, 'tolak']);
    Route::put('/dashboard/ajuan-disetujui/{peminjaman:slug}', [DashboardPerpanjanganController::class, 'setujui']);
    
    //Peminjaman
    Route::get('/dashboard/peminjamans/checkSlug', [DashboardPeminjamanController::class, 'checkSlug']);
    Route::get('/dashboard/peminjaman-buku/{peminjaman:slug}', [DashboardPinjamController::class, 'pinjam']);
    Route::get('/dashboard/pengembalian-buku/{peminjaman:slug}', [DashboardPinjamController::class, 'kembali']);
    Route::get('/dashboard/konfirmasi-buku/{peminjaman:slug}', [DashboardPinjamController::class, 'konfirmasi']);
    Route::get('/dashboard/tolak-peminjaman/{peminjaman:slug}', [DashboardPinjamController::class, 'tolak']);
    Route::put('/dashboard/kondisi-peminjaman/{peminjaman:slug}', [DashboardPinjamController::class, 'kondisi']);
    Route::get('/dashboard/kondisi-peminjaman/hilang/{peminjaman:slug}', [DashboardPinjamController::class, 'hilang']);
    Route::get('/dashboard/kondisi-peminjaman/rusak/{peminjaman:slug}', [DashboardPinjamController::class, 'rusak']);
    Route::resource('/dashboard/peminjamans', DashboardPeminjamanController::class);
    
    //Pengembalian
    Route::get('/dashboard/sirkulasi/pengembalians/checkSlug', [DashboardPengembalianController::class, 'checkSlug']);
    Route::resource('/dashboard/sirkulasi/pengembalians', DashboardPengembalianController::class);

    //Koleksi-Buku
    Route::get('/dashboard/bookcollection/checkSlug', [DashboardKatalogController::class, 'checkSlug']);
    Route::resource('/dashboard/bookcollection', DashboardKatalogController::class);
    
    //Users
    // Route::get('/dashboard/users/approved/{user:id}', [DashboardUserController::class, 'approved']);
    Route::get('/dashboard/users/checkSlug', [DashboardUserController::class, 'checkSlug']);
    Route::resource('/dashboard/users', DashboardUserController::class);
    
    //Category
    Route::get('/dashboard/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/categories', DashboardCategoryController::class);
});

//Anggota
// Route::get('/dashboard/authors/checkSlug', [DashboardAuthorController::class, 'checkSlug'])->middleware('auth');
// Route::resource('/dashboard/anggota', DashboardAnggotaController::class)->middleware('auth');


//ROLE ADMIN
// Route::resource('/home/sirkulasi/peminjaman-buku', AnggotaController::class)->except('show')->middleware('auth');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardAuthorController;
use App\Http\Controllers\DashboardKatalogController;

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

Route::get('/', function () {
    return view('home.home', [
        "title" => "LPTP Surakarta",
    ]);
});

//Home-Sirkulasi 
Route::get('/home/sirkulasi/peminjaman-buku', function () {
    return view('home.sirkulasi.peminjaman-buku', [
        "title" => "Sirkulasi",
    ]);
});
Route::get('/home/sirkulasi/pengembalian-buku', function () {
    return view('home.sirkulasi.pengembalian-buku', [
        "title" => "Sirkulasi",
    ]);
});

Route::get('/home/sirkulasi/penelusuran-katalog', [KatalogController::class, 'index']);
Route::get('/home/sirkulasi/penelusuran-katalog/{katalog:slug}', [KatalogController::class, 'show']);
// Route::get('/home/sirkulasi/penelusuran-katalog/categories/{category:slug}', function(Category $category) {
//     return view('home.sirkulasi.penelusuran-katalog', [
//         'title' =>"Katalog by Category $category->name",
//         'katalogs' => $category->katalogs->load('category', 'author')
//     ]);
// });
// Route::get('/home/sirkulasi/penelusuran-katalog/authors/{author:username}', function(Author $author){
//     return view('home.sirkulasi.penelusuran-katalog', [
//         'title' => "Katalog by Author $author->name" ,
//         'katalogs' => $author->katalogs->load('category', 'author')
//     ]);
// });

Route::get('/home/sirkulasi/bebas-pustaka', function () {
    return view('home.sirkulasi.bebas-pustaka', [
        "title" => "Sirkulasi"
    ]);
});

//Home-Layanan
Route::get('/home/layanan/keanggotaan', function () {
    return view('home.layanan.keanggotaan', [
        "title" => "Layanan",
    ]);
});
Route::get('/home/layanan/bibliography', function () {
    return view('home.layanan.bibliography', [
        "title" => "Layanan",
    ]);
});
Route::get('/home/layanan/bibliography/detil', function () {
    return view('home.detil.detil-bibliography', [
        "title" => "Layanan",
    ]);
});

//Home-Koleksi-Digital
Route::get('/home/koleksi-digital', function () {
    return view('home.koleksi-digital.koleksi-digital', [
        "title" => "Koleksi Digital",
    ]);
});
Route::get('/home/koleksi-digital/koleksi-digital/detil', function () {
    return view('home.detil-koleksi-digital', [
        "title" => "Koleksi Digital",
    ]);
});

//SIGN IN
Route::get('/sign-in', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/sign-in', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//SIGN UP
Route::get('/sign-up', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/sign-up', [RegisterController::class, 'store']);

//DASHBOARD
Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');

//Penulis
Route::get('/dashboard/authors/checkSlug', [DashboardAuthorController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/authors', DashboardAuthorController::class)->middleware('auth');

//Penelusuran Katalog
Route::get('/dashboard/sirkulasi/katalogs/checkSlug', [DashboardKatalogController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/sirkulasi/katalogs', DashboardKatalogController::class)->middleware('auth');
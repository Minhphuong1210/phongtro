<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiaChiController;
use App\Http\Controllers\Admin\PhongtroController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\GoogleAuthController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
// câu lệnh chay php artisan serve

Route::get('/create_admin', function () {

    $user = User::create([
        'name' => 'Admin',
        'email' => 'Admin@gmail.com',
        'password' => bcrypt('12345678Aa')
    ]);
});

Route::get('/create_user', function () {

    $user = User::create([
        'name' => 'User',
        'email' => 'User@gmail.com',
        'password' => bcrypt('123456789Aa')
    ]);
});

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/chi_tiet/{slug}', [HomeController::class, 'chi_tiet'])->name('chi_tiet');
Route::get('tim_phong/{slug}', [HomeController::class, 'tim_phong'])->name(name: 'tim_phong');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/thongbao', [HomeController::class, 'thongBao'])->name(name: 'thongBao');
Route::get('/cho-thue-co-mat-thue-khong', [HomeController::class, 'choThueTroCoMatThue'])->name(name: 'choThueTroCoMatThue');
Route::get('/nhung-dieu-can-luu-y-khi-o-tro', [HomeController::class, 'nhungDieuCanLuuYKhiOTro'])->name(name: 'nhungDieuCanLuuYKhiOTro');
Route::get('/quyen-loi-khi-o-tro', [HomeController::class, 'quyenLoiKhiThueTro'])->name(name: 'quyenLoiKhiThueTro');

Route::prefix('DiaChi')->name('DiaChi.')->group(function () {
    Route::get('/xa', [DiaChiController::class, 'getXa'])->name('getXa');
    Route::post('/showxa', [DiaChiController::class, 'xa'])->name('showxa');

    Route::post('/huyen', [DiaChiController::class, 'huyen'])->name('huyen');
    Route::post('/thanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
    // Route::get('/getthanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
    Route::get('/thanhPho', [DiaChiController::class, 'getThanhPho'])->name('getThanhPho');
});
Route::get('/theo_gia_va_dien_tich', [HomeController::class, 'theo_gia_va_dien_tich'])->name('theo_gia_va_dien_tich');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password',[AuthController::class,'forgot_password'])->name('forgot_password');
Route::post('/forgot_password_email',[AuthController::class,'forgot_password_email'])->name('forgot_password_email');
Route::get('reset_password/{token}',[AuthController::class,'reset_password'])->name('account.reset_password');
Route::post('reset_password/{token}',[AuthController::class,'check_reset_password']);




Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/thong_tin_ca_nhan', [UserController::class, 'thongTinCaNhan'])->name('thongTinCaNhan');
    Route::put('/edit-user/{id}', [AuthController::class, 'editUser'])->name('edit');
    Route::get('/dang-tin', [UserController::class, 'dangtin'])->name('dangtin');
    Route::post('post-dang-tin', [UserController::class, 'Postdangtin'])->name('Postdangtin');
    Route::get('/quan-li-dang-tin', [UserController::class, 'quanLyDangTin'])->name('QuanLyDangTin');
    Route::post('/search-phong', [UserController::class, 'searchPhong'])->name('searchPhong');
    Route::post('/chothue', [UserController::class, 'chothue'])->name('chothue');
    Route::get('/doi-mat-khau', [AuthController::class, 'doiMatKhau'])->name('doiMatKhau');
    Route::put('/doi-mat-khau/{id}', [AuthController::class, 'edit_password'])->name('edit_password');


});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/add', [CategoryController::class, 'add'])->name('add');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('phongtro')->name('phong_tro.')->group(function () {
        Route::get('/', [PhongtroController::class, 'index'])->name('index');
        Route::get('/create', [PhongtroController::class, 'create'])->name('create');
        Route::post('/store', [PhongtroController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PhongtroController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PhongtroController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PhongtroController::class, 'destroy'])->name('destroy');
        Route::get('/danhsachcacphong', [PhongtroController::class, 'getPhongtrochothue'])->name('getPhongtrochothue');
    });

    Route::prefix('DiaChi')->name('DiaChi.')->group(function () {
        Route::get('/xa', [DiaChiController::class, 'getXa'])->name('getXa');
        Route::post('/showxa', [DiaChiController::class, 'xa'])->name('showxa');
        Route::post('/huyen', [DiaChiController::class, 'huyen'])->name('huyen');
        Route::post('/thanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
        Route::get('/getthanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create');
        Route::post('/add', [UsersController::class, 'add'])->name('add');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('destroy');
    });

    Route::post('/danhSachphongTheoNgay',[DashboardController::class,'getPhongTroTheoNgay'])->name('getPhongTroTheoNgay');
});


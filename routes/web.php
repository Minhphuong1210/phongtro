<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiaChiController;
use App\Http\Controllers\Admin\PhongtroController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/create_admin', function () {

    $user = User::create([
        'name' => 'Admin',
        'email' => 'Admin@gmail.com',
        'password' => bcrypt('123456')
    ]);
});

Route::get('/create_user', function () {

    $user = User::create([
        'name' => 'User',
        'email' => 'User@gmail.com',
        'password' => bcrypt('123456')
    ]);
});


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/chi_tiet/{slug}',[HomeController::class,'chi_tiet'])->name('chi_tiet');
Route::get('tim_phong/{slug}',[HomeController::class,'tim_phong'])->name('tim_phong');
// Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('Admin.Dashboard');
        });

        Route::prefix('category')->name('admin.category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');

            Route::get('/create', [CategoryController::class, 'create'])->name('create');

            Route::post('/add', [CategoryController::class, 'add'])->name('add');

            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');

            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');

        });

        Route::prefix('phongtro')->name('admin.phong_tro.')->group(function () {
            Route::get('/', [PhongtroController::class, 'index'])->name('index');

            Route::get('/create', [PhongtroController::class, 'create'])->name('create');

            Route::post('/store', [PhongtroController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [PhongtroController::class, 'edit'])->name('edit');

            Route::put('/update/{id}', [PhongtroController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [PhongtroController::class, 'destroy'])->name('destroy');

        });

        Route::prefix('DiaChi')->name('admin.DiaChi.')->group(function () {
            Route::get('/xa', [DiaChiController::class, 'getXa'])->name('getXa');
            Route::post('/showxa', [DiaChiController::class, 'xa'])->name('showxa');

            Route::post('/huyen', [DiaChiController::class, 'huyen'])->name('huyen');
            Route::post('/thanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
            Route::get('/getthanhpho', [DiaChiController::class, 'thanhpho'])->name('thanhpho');
        });
    });
// });

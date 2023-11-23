<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChiTietTourController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DiadiemController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GiamGiaController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhachSanController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhuongTienController;
use App\Http\Controllers\QuocTichController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TinhThanhController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ToursController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

//use UniSharp\LaravelFilemanager\Lfm;


Route::group(['prefix' => '/admin'], function (){

    Route::group(['prefix' => '/admin'], function (){
        Route::get('/', [AdminController::class, 'index']);
        Route::post('/create', [AdminController::class, 'store']);
        Route::get('/data', [AdminController::class, 'data']);
        Route::post('/delete', [AdminController::class, 'destroy']);
        Route::post('/update', [AdminController::class, 'update']);
    });

    Route::group(['prefix' => '/khach-hang'], function (){
        Route::get('/', [KhachHangController::class, 'index']);
        Route::post('/create', [KhachHangController::class, 'store']);
        Route::get('/data', [KhachHangController::class, 'data']);
        Route::post('/delete', [KhachHangController::class, 'destroy']);
        Route::post('/update', [KhachHangController::class, 'update']);
        Route::post('/change-status', [KhachHangController::class, 'changeStatus']);
    });


    Route::group(['prefix' => '/tai-khoan'], function (){
        Route::get('/', [TaiKhoanController::class, 'index']);
        Route::post('/create', [TaiKhoanController::class, 'store']);
        Route::get('/data', [TaiKhoanController::class, 'data']);
        Route::post('/delete', [TaiKhoanController::class, 'destroy']);
        Route::post('/update', [TaiKhoanController::class, 'update']);
    });
    Route::group(['prefix' => '/tinh-thanh'], function (){
        Route::get('/', [TinhThanhController::class, 'index']);
        Route::post('/create', [TinhThanhController::class, 'store']);
        Route::get('/data', [TinhThanhController::class, 'data']);
        Route::post('/delete', [TinhThanhController::class, 'destroy']);
        Route::post('/update', [TinhThanhController::class, 'update']);
    });

    Route::group(['prefix' => '/chuc-nang'], function (){
        Route::get('/', [ChucNangController::class, 'index']);
        Route::post('/create', [ChucNangController::class, 'store']);
        Route::get('/data', [ChucNangController::class, 'data']);
        Route::post('/delete', [ChucNangController::class, 'destroy']);
        Route::post('/update', [ChucNangController::class, 'update']);
    });

    Route::group(['prefix' => '/quyen'], function (){
        Route::get('/', [QuyenController::class, 'index']);
        Route::post('/create', [QuyenController::class, 'store']);
        Route::get('/data', [QuyenController::class, 'data']);
        Route::post('/delete', [QuyenController::class, 'destroy']);
        Route::post('/update', [QuyenController::class, 'update']);
        Route::post('/change-status', [QuyenController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/hoa-don'], function (){
        Route::get('/', [HoaDonController::class, 'index']);
        Route::post('/create', [HoaDonController::class, 'store']);
        Route::get('/data', [HoaDonController::class, 'data']);
        Route::post('/update', [HoaDonController::class, 'update']);
        Route::post('/delete', [HoaDonController::class, 'destroy']);
        Route::post('/change-status', [HoaDonController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/tour'], function (){
        Route::get('/', [TourController::class, 'index']);
        Route::post('/create', [TourController::class, 'store']);
        Route::get('/data', [TourController::class, 'data']);
        Route::post('/update', [TourController::class, 'update']);
        Route::post('/delete', [TourController::class, 'destroy']);
        Route::post('/change-status', [TourController::class, 'changeStatus']);
    });
    Route::group(['prefix' => '/chi-tiet-tour'], function (){
        Route::get('/', [ChiTietTourController::class, 'index']);
        Route::post('/create', [ChiTietTourController::class, 'store']);
        Route::get('/data', [ChiTietTourController::class, 'data']);
        Route::post('/update', [ChiTietTourController::class, 'update']);
        Route::post('/delete', [ChiTietTourController::class, 'destroy']);
        Route::post('/change-status', [ChiTietTourController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/danh-gia'], function (){
        Route::get('/', [DanhGiaController::class, 'index']);
        Route::post('/create', [DanhGiaController::class, 'store']);
        Route::get('/data', [DanhGiaController::class, 'data']);
        Route::post('/update', [DanhGiaController::class, 'update']);
        Route::post('/delete', [DanhGiaController::class, 'destroy']);
        Route::post('/change-status', [DanhGiaController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/quoc-tich'], function (){
        Route::get('/', [QuocTichController::class, 'index']);
        Route::post('/create', [QuocTichController::class, 'store']);
        Route::get('/data', [QuocTichController::class, 'data']);
        Route::post('/update', [QuocTichController::class, 'update']);
        Route::post('/delete', [QuocTichController::class, 'destroy']);
        Route::post('/change-status', [QuocTichController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/phuong-tien'], function (){
        Route::get('/', [PhuongTienController::class, 'index']);
        Route::post('/create', [PhuongTienController::class, 'store']);
        Route::get('/data', [PhuongTienController::class, 'data']);
        Route::post('/update', [PhuongTienController::class, 'update']);
        Route::post('/delete', [PhuongTienController::class, 'destroy']);
        Route::post('/change-status', [PhuongTienController::class, 'changeStatus']);

    });

    Route::group(['prefix' => '/dia-diem'], function (){
        Route::get('/', [DiadiemController::class, 'index']);
        Route::post('/create', [DiadiemController::class, 'store']);
        Route::get('/data', [DiadiemController::class, 'data']);
        Route::post('/update', [DiadiemController::class, 'update']);
        Route::post('/delete', [DiadiemController::class, 'destroy']);
    });

    Route::group(['prefix' => '/khach-san'], function (){
        Route::get('/', [KhachSanController::class, 'index']);
        Route::post('/create', [KhachSanController::class, 'store']);
        Route::get('/data', [KhachSanController::class, 'data']);
        Route::post('/update_data', [KhachSanController::class, 'update']);
        Route::post('/delete', [KhachSanController::class, 'destroy']);
        Route::post('/change-status', [KhachSanController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/cau-hinh'], function() {
        Route::get('/', [ConfigController::class, 'index']);
        Route::get('/data', [ConfigController::class, 'getData']);
        Route::get('/all-data', [ConfigController::class, 'getAllData']);

        Route::post('/', [ConfigController::class, 'store']);
    });
});


Route::group(['prefix' => '/laravel-filemanager'], function () {
    Lfm::routes();
});
Route::group(['prefix' => '/client'], function (){
    Route::post('/register', [HomepageController::class, 'actionRegister']);
    Route::post('/login', [HomepageController::class, 'actionLogin'])->name('login');
    Route::get('/get-data-quoc-tich', [HomepageController::class, 'getDataQuocTich']);
    Route::post('/dat-hang', [TourController::class, 'datHang'])->name('datHang');
    Route::post('/add-card-tour', [TourController::class, 'addToCart']);
    Route::get('/checkout', [TourController::class, 'indexCheckout']);
    Route::post('/data-list-cart', [DonHangController::class, 'dataListCart']);

});
Route::get('/logout', [HomepageController::class, 'actionLogout']);
<<<<<<< HEAD
Route::get('/', [TestController::class, 'index'])->name('home');
=======
Route::get('/', [TestController::class, 'index']);
Route::get('/lien-he', [TestController::class, 'indexLienHe']);
>>>>>>> 52b4dce9bd899d69f9a0f3367dd6d309859a24bb
Route::get('/login-register', [HomepageController::class, 'indexLoginRegister']);
Route::get('/contact', [HomepageController::class, 'contactindex']);
Route::get('/gioi-thieu', [HomepageController::class, 'gioithieuindex']);

Route::post('/tour/data', [TourController::class, 'getDataTour']);
Route::get('/tour', [TourController::class, 'indexTour']);
Route::get('/detail-tour/{id}', [TourController::class, 'viewDetailTour']);
Route::get('/delete-tour/{id}', [TourController::class, 'deleteTour']);

Route::post('/detail-tour/data', [TourController::class, 'getDataDetailTour']);
Route::post('/booking-process', [BookingController::class, 'processBooking']);
Route::get('/confirm/order', [TourController::class, 'confirm'])->name('confirmOrder');

Route::post('payment/vnpay', [PaymentController::class, 'vnpay'])->name('payment.vnpay');
Route::get('payment/vnpay', [PaymentController::class, 'vnpayReturn'])->name('payment.vnpay.return');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GambarController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\RefundController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AtributController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CatarticleController;
use App\Http\Controllers\Admin\PersediaanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\OngkirController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Users\HalcustController;
use App\Http\Controllers\Users\HalproductController;
use App\Http\Controllers\Users\HaldetailartikelController;
use App\Http\Controllers\Users\Haldetailpro;



Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/show-profil', [HalcustController::class, 'showUser']);
        Route::get('product/detail-product/{id}', [HalproductController::class, 'detailByProduct']);
        Route::post('/add-to-cart', [CartController::class, 'store']);
        Route::post('/update-to-cart', [CartController::class, 'updateCartQty']);
        Route::post('delete-cart-item', [CartController::class, 'deleteCart']);
        Route::get('/cart', [CartController::class, 'cart']);
        Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart']);
        Route::get('/checkout', [CheckoutController::class, 'showCo']);
        Route::post('/save-checkout', [CheckoutController::class, 'saveCheckout']);
        Route::get('/penilaian', [HalcustController::class, 'showRating']);
        Route::get('/wishlist', [HalcustController::class, 'showWhish']);
    }
);

Route::middleware(['cors'])->group(function () {
    Route::get('/payment', [CheckoutController::class, 'reqPayment']);
    Route::post('/confirmPayment', [CheckoutController::class, 'confirmPayment']);
});

// USER
Route::get('/', [HalcustController::class, 'index']);
Route::get('/artikel', [HalcustController::class, 'showArticle']);
Route::get('/store', [HalcustController::class, 'showStore']);
Route::get('/about', [HalcustController::class, 'showAbout']);
Route::get('/contact', [HalcustController::class, 'showContact']);
Route::get('/how-to-refund', [HalcustController::class, 'showRefund']);
Route::get('/how-to-order', [HalcustController::class, 'showHow']);
Route::get('/FAQ', [HalcustController::class, 'showFaq']);
Route::get('product', [HalproductController::class, 'index']);
Route::get('product/{slug}', [HalproductController::class, 'categoryShow']);
Route::get('product/{cat_slug}/{pro_slug}', [HalproductController::class, 'detailByCategory'])->name('ByID');
Route::get('artikel/{slug}', [HalcustController::class, 'showByCatarticle']);
Route::get('artikel/detail-artikel/{id}', [HaldetailartikelController::class, 'detailByArtikel']);

// ADMIN
// KATEGORI PRODUCT
Route::get('kategori', [CategoryController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-category/{slug?}', 'App\Http\Controllers\Admin\CategoryController@addEditCategory');
Route::get('/delete-category/{slug}', [CategoryController::class, 'deleteCategory']);

// PRODUCT
Route::get('barang', [PersediaanController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-product/{slug?}', 'App\Http\Controllers\Admin\PersediaanController@addEditProduct');
Route::get('/delete-product/{slug}', [PersediaanController::class, 'deleteProduct']);

// GAMBAR DETAIL PRODUCT
Route::match(array('get', 'post'), '/add-image/{id}', 'App\Http\Controllers\Admin\PersediaanController@addImage');
Route::get('/delete-image/{id}', [PersediaanController::class, 'deleteImage']);

// ATRIBUT (SIZE, STOCK, SKU)
Route::post('/edit-atribut/{id}', 'App\Http\Controllers\Admin\PersediaanController@editAtribut');
Route::match(array('get', 'post'), '/add-atribut/{id}', 'App\Http\Controllers\Admin\PersediaanController@addAtribut');
Route::get('/delete-atribut/{id}', [PersediaanController::class, 'deleteAtribut']);

// ARTIKEL
Route::get('article', [ArticleController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-article/{slug?}', 'App\Http\Controllers\Admin\ArticleController@addEditArticle');
Route::get('/delete-article/{slug}', [ArticleController::class, 'deleteArticle']);


// KATEGORI ARTIKEL
Route::get('catarticle', [CatarticleController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-catarticle/{slug?}', 'App\Http\Controllers\Admin\CatarticleController@addEditCatarticle');
Route::get('/delete-catarticle/{slug}', [CatarticleController::class, 'deleteCatarticle']);

// BANNER
Route::get('banner', [BannerController::class, 'index']);
Route::post('update-banner-status', [BannerController::class, 'updateBannerStatus']);
Route::match(array('get', 'post'), '/add-edit-banner/{id?}', 'App\Http\Controllers\Admin\BannerController@addEditBanner');
Route::get('/delete-banner/{id}', [BannerController::class, 'deleteBanner']);

// ONGKIR
Route::get('ongkir', [OngkirController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-ongkir/{slug?}', 'App\Http\Controllers\Admin\OngkirController@addEditongkir');
Route::get('/delete-ongkir/{slug}', [OngkirController::class, 'deleteongkir']);

// REFUND
Route::get('refund', [RefundController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-refund/{id?}', 'App\Http\Controllers\Admin\RefundController@addEditrefund');
Route::get('/delete-refund/{id}', [RefundController::class, 'deleterefund']);

// FAQ
Route::get('faq', [FaqController::class, 'index']);
Route::match(array('get', 'post'), '/add-edit-faq/{id?}', 'App\Http\Controllers\Admin\FaqController@addEditfaq');
Route::get('/delete-faq/{id}', [FaqController::class, 'deletefaq']);

// USER
Route::get('user', [UserController::class, 'index']);
Route::get('admin', [UserController::class, 'showAdmin']);

// TRANSAKSI
Route::get('penjualan', [CheckoutController::class, 'showTrans']);
Route::get('laba/{id}', [CheckoutController::class, 'showLaba']);
Route::get('laporan', [CheckoutController::class, 'showLaporan']);

Auth::routes();

Route::get('/create-admin', [UserController::class, 'create']);
Route::get('admin', [UserController::class, 'showAdmin']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard')->middleware('is_admin');



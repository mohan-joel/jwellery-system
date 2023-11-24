<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JwelleryTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;


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
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login_view'])->name('login_view')->middleware('guest');
Route::get('/register',[AuthController::class,'register_view'])->name('register_view')->middleware('guest');

Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/register',[AuthController::class,'register'])->name('register_user');

Route::group(['middleware'=>['web','auth','checkAdmin','checkUser']],function(){

    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    //Routes for jwellery type
    Route::get('/jwellery-type',[JwelleryTypeController::class,'show'])->name('jwellery-type');
    Route::post('/add-jwellery-type',[JwelleryTypeController::class,'add'])->name('add-jwellery-type');
    Route::post('/edit-jwellery-type',[JwelleryTypeController::class,'update'])->name('edit-jwellery-type');
    Route::put('/delete-jwellery-type',[JwelleryTypeController::class,'delete'])->name('delete-jwelleryType');
    Route::get('/seach-jwellery-type',[JwelleryTypeController::class,'search'])->name('searchJwelleryType');

    //Routes for products
    Route::get('/product',[ProductController::class,'show'])->name('show-product');
    Route::post('/add-products',[ProductController::class,'add'])->name('add-products');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit-product');
    Route::put('/update-product',[ProductController::class,'update'])->name('update-product');
    Route::put('/delete-product',[ProductController::class,'delete'])->name('delete-product');
    Route::get('/search-product',[ProductController::class,'searchProduct'])->name('searchProduct');
    

    //Routes for suppliers
    Route::get('/suppliers',[SupplierController::class,'show'])->name('show-supplier');
    Route::post('/add-suppliers',[SupplierController::class,'add'])->name('add-suppliers');
    Route::get('/edit-supplier/{id}',[SupplierController::class,'edit'])->name('edit-supplier');
    Route::put('/update-supplier',[SupplierController::class,'update'])->name('update-supplier');
    Route::put('/delete-supplier',[SupplierController::class,'delete'])->name('delete-supplier');
    Route::get('/search-supplier',[SupplierController::class,'searchSupplier'])->name('searchSupplier');


        //Routes for stocks
    Route::get('/stocks',[StockController::class,'show'])->name('show-stock');
    Route::get('/get-supplier-info/{id}',[StockController::class,'getSuppliersInfo']);
    Route::get('/get-products-details/{id}',[StockController::class,'getProductDetails']);
    Route::get('/get-more-products-details/{id}',[StockController::class,'getMoreProductDetails']);
    Route::post('/add-stock-details',[StockController::class,'addStockDetails'])->name('add-stock-details');
    Route::get('/get-stocks-details/{id}',[StockController::class,'getStockDetails']);
    Route::post('/update-stock-details',[StockController::class,'updateStockDetails'])->name('update-stock-details');
    Route::get('/delete-stock',[StockController::class, 'delete'])->name('delete-stock');
    Route::get('/search-stock',[StockController::class,'searchStock'])->name('searchStock');
   
    Route::get('/add-product-in-stock',[StockController::class,'showInputPage']);
    Route::get('/input-by-barcode/{barcode}',[StockController::class,'inputFromBCR']);
    Route::get('/show-sold-products',[StockController::class,'showSoldProduct'])->name('show-sold-products');
    Route::get('/get-product-by-barcode/{barcode}',[StockController::class,'getProductByBarcode']);
    Route::get('/show-test-barcode',[StockController::class,'showTestBarcode']);

    //Routes for barcodes
    Route::get('/show-all-barcodes',[StockController::class,'showAllBarcodes'])->name('show-barcodes');
    Route::get('/grave-all-stock-details/{id}',[StockController::class,'showEachStockInfo']);
    Route::get('/scan-info',[StockController::class,'showScanInfo'])->name('scanInfo');
  
    

    //Routes for customers
    Route::get('/show-customers',[CustomerController::class,'show'])->name('show-customers');
    Route::get('/show-customers-bill/{id}',[CustomerController::class,'showCustomersBill']);


    // Route for profile setting
    Route::get('/show-profile-setting',[DashboardController::class,'showProfileSetting'])->name('showProfileSetting');
    Route::get('/check-current-password/{current_password}',[DashboardController::class,'checkCurrentPassword']);
    Route::post('/update-profile-info/{id}',[DashboardController::class,'updateProfileInfo']);
    Route::post('/updateProfilePic/{id}',[DashboardController::class,'updateProfilePic']);

    //Route for updating shop details
    Route::get('/shop-details',[ShopController::class,'show'])->name('shop-details');
    Route::post('/add-shop-details',[ShopController::class,'addShopDetails'])->name('add-shop-details');
    Route::post('/update-shop-details/{shopDetails}',[ShopController::class,'updateShop'])->name('update-shop-details');

    //Routes for weight Converter
    Route::get('/show-weight-converter',[DashboardController::class,'showWeightConverter'])->name('weight-converter');


    //Routes for sale order
    Route::get('/sale-order',[SaleOrderController::class,'show'])->name('sale-order');
    Route::get('/get-products-name/{id}',[SaleOrderController::class,'getProductName']);
    Route::get('/get-more-products/{id}',[SaleOrderController::class,'getMoreProduct']);
    Route::post('/add-sale-order',[SaleOrderController::class,'add'])->name('add-sale-orders');
    Route::put('/delete-sale-order',[SaleOrderController::class,'delete'])->name('delete-sale-order');
    Route::get('/get-sale-order-detail/{id}',[SaleOrderController::class,'getSaleOrderDetail']);
    Route::get('/get-jwellery-type-details/{id}',[SaleOrderController::class,'getJwelleryTypeDetails']);
    Route::get('/get-product-details/{id}',[SaleOrderController::class,'getProductDetails']);
    Route::post('/update-sale-order-details',[SaleOrderController::class,'updateSaleOrder'])->name('update-sale-order');
    Route::get('/get-customers-details/{id}',[SaleOrderController::class,'getCustomerDetail']);
    Route::get('/get-editCustomers-details/{id}',[SaleOrderController::class,'getEditCustomerDetail']);


    Route::get('/access-denied',[AuthController::class,'accessDenied']);

   


});







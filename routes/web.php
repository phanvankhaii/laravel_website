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


//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');


//frontend
Route::get('/','HomeController@home');
Route::get('/trang-chu','HomeController@home');
Route::get('/san-pham','HomeController@index');
//tìm kiếm
Route::post('/tim-kiem','HomeController@timkiem');


//danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@detail_product');



//category product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');

Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');  //category_product_id mang id cua danh muc
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');


//Brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');

Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');

Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');  //category_product_id mang id cua danh muc
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');



//Product product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');

Route::get('/delete-product/{product_id}','ProductController@delete_product');

Route::post('/update-product/{product_id}','ProductController@update_product');

Route::post('/save-product','ProductController@save_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');  //category_product_id mang id cua danh muc
Route::get('/active-product/{product_id}','ProductController@active_product');


//giỏ hàng
// Route::post('/save-cart','CartController@save_cart');
// Route::post('/add-cart-ajax','CartController@add_cart_ajax');
// Route::get('/gio-hang','CartController@gio_hang'); 
// Route::get('/xoa-san-pham/{session_id}','CartController@xoa_san_pham');
// Route::post('/update-cart','CartController@update_cart');
// Route::get('/xoa-tat-ca','CartController@xoa_tat_ca');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');

//đơn hàng
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_id}','CheckoutController@view_order');

//mã giảm giá (mgg)
Route::post('/check-magiamgia','KMController@check_magiamgia');

Route::get('/add-magiamgia','KMController@add_magiamgia');
Route::get('/list-magiamgia','KMController@list_magiamgia');
Route::get('/delete-magiamgia/{id_mgg}','KMController@delete_magiamgia');
Route::post('/add-mgg','KMController@add_mgg'); //form thêm mgg

//phí vận chuyển
Route::get('/add-vanchuyen','PhiVanChuyen@vanchuyen');
Route::post('/select-phivanchuyen','PhiVanChuyen@select_phivanchuyen');
Route::post('/add-phivanchuyen','PhiVanChuyen@add_phivanchuyen');
Route::post('/chon-phivanchuyen','PhiVanChuyen@chon_phivanchuyen');
Route::post('/update-phivanchuyen','PhiVanChuyen@update_phivanchuyen');


//checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/select-phivanchuyen-home','CheckoutController@select_phivanchuyen_home');
Route::post('/tinh-phi-van-chuyen','CheckoutController@tinh_phi_van_chuyen');
Route::get('/xoa-phi-ship','CheckoutController@xoa_phi_ship');

Route::post('/xac-nhan-don-hang','CheckoutController@xac_nhan_don_hang');

Route::get('/dangki','CheckoutController@dangki');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
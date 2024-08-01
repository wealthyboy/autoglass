<?php  

use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index')->name('admin_home');
Route::get('/export', 'Exports\ExportsController@index');

Route::get('/maintainance/mode', 'Live\LiveController@index')->name('maintainance');
Route::get('live', 'Live\LiveController@activate');
Route::resource('activities', 'Activity\ActivityController', ['names' => 'admin.activities']);
Route::resource('appointments', 'Appointment\AppointmentController', ['names' => 'admin.appointments']);

Route::get('reports', 'Account\AccountsController@index');
Route::get('account/filter', 'Account\AccountsController@index')->name('filter_sales');
Route::post('customers/wallet/{id}', 'Customers\CustomersController@fundWallet');
Route::post('/update/status', 'Orders\OrdersController@updateStatus');
Route::resource('credits', 'AutoCredit\AutoCreditController', ['names' => 'admin.credits']);

Route::resource('blogs', 'Blog\BlogController', ['names' => 'blogs']);

Route::resource('customers', 'Customers\CustomersController', ['names' => 'customers']);

Route::get('orders/invoice/{id}', 'Orders\OrdersController@invoice')->name('order.invoice');
Route::post('orders/status', 'Orders\OrdersController@updateStatus');

Route::get('orders/dispatch/{id}', 'Orders\OrdersController@dispatchNote')->name('order.dispatch.note');
Route::resource('location', 'Location\LocationController', ['names' => 'location']);
Route::resource('engines', 'Engines\EnginesController', ['names' => 'engines']);

Route::resource('permissions', 'Permission\PermissionsController', ['names' => 'permissions']);
Route::post('upload/image', 'Image\ImagesController@store');
Route::post('delete/image', 'Image\ImagesController@undo');
Route::post('upload', 'Uploads\UploadsController@store');
Route::get('delete/upload', 'Uploads\UploadsController@destroy');
Route::resource('users', 'Users\UsersController', ['names' => 'admin.users']);
Route::post('/products/update-price/{id}', 'Product\ProductController@updatePrice');

Route::resource('banners', 'Design\BannersController', ['names' => 'banners']);
Route::resource('pages', 'Information\InformationController', ['names' => 'pages']);
Route::resource('settings', 'Settings\SettingsController', ['names' => 'settings']);

Route::resource('shipping', 'Shipping\ShippingController', ['names' => 'shipping']);
Route::resource('location', 'Location\LocationController', ['names' => 'location']);
Route::resource('attributes', 'Attributes\AttributesController', ['names' => 'attributes']);
Route::resource('payments', 'Payments\PaymentController', ['names' => 'payments']);
Route::resource('rates', 'CurrencyRates\CurrencyRatesController', ['names' => 'rates']);
Route::resource('vouchers', 'Vouchers\VouchersController', ['names' => 'vouchers']);
Route::get('products/search/makemodelyear', 'Product\ProductController@makeModelYearSearch');
Route::get('/related/products', 'Product\ProductController@getRelatedProducts');
Route::delete('/related_products/{id}', 'RelatedProducts\RelatedProductsController@destroy');

Route::resource('products', 'Product\ProductController', ['names' => 'products']);

Route::resource('category', 'Category\CategoryController', ['names' => 'category']);
Route::post('category/delete/image', 'Category\CategoryController@undo');
Route::resource('reviews', 'Reviews\ReviewsController', ['names' => 'admin.reviews']);
Route::resource('orders', 'Orders\OrdersController', ['names' => 'admin.orders']);
Route::resource('brands', 'Brand\BrandsController', ['names' => 'brands']);
Route::resource('promos', 'Promo\PromoController', ['names' => 'promos']);
Route::get('promo-text/create/{id}', 'PromoText\PromoTextController@create')->name('create.promo.text');
Route::get('promo-text/edit/{id}', 'PromoText\PromoTextController@edit')->name('edit_promo_text');
Route::post('promo-text/edit/{id}', 'PromoText\PromoTextController@update');
Route::post('promo-text/create/{id}', 'PromoText\PromoTextController@store');
Route::get('promo-text/delete/{id}', 'PromoText\PromoTextController@destroy')->name('delete.promo.text');
Route::resource('discounts', 'Discounts\DiscountsController', ['names' => 'discounts']);

<?php

Route::get('/', 'LandingPageController@index')->name('landing-page');
Route::get('/us', 'UsController@index')->name('us.index');
//Route::get('/seguimiento', 'SeguimientoController@index')->name('seguimiento.index');
//Route::post('/seguimiento/my-order', 'SeguimientoController@store')->name('seguimiento.store');
// Route::get('/seguimiento/back', 'SeguimientoController@back')->name('seguimiento.back');
//Route::get('/my-order/{order}', 'SeguimientoController@show')->name('orderguest.show');

//Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{post}', 'BlogController@show')->name('blog.show');
//Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/specialty/{specialty}', 'SpecialtyController@show')->name('specialty.show');
// Route::get('/password', 'SearchController@reset')->name('password');
//Route::get('/cart', 'CartController@index')->name('cart.index');
//Route::get('/cart/records', 'CartController@records');
//Route::post('shop/cart/create', 'CartController@store')->name('cart.store');
//Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
//Route::patch('/shop/cart/{product}', 'CartController@update')->name('cart.update');
//Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
//Route::delete('/shop/cart/{product}', 'CartController@destroy');
//Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

//Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
//Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

//Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
//Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

// Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
//Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
//Route::get('/checkout/tables', 'CheckoutController@tables');
//Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
//Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

//Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});


Route::resource('contacto', 'ContactoController');

Route::get('cargar-mapa/{id}', 'ContactoController@cargar');
Route::get('sitemap.xml','SitemapController@index');
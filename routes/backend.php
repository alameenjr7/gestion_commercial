<?php

use Illuminate\Support\Facades\Route;


//Admin login
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout',[\App\Http\Controllers\Auth\Admin\LogoutController::class, 'logout'])->name('admin.logout');
});

//Admin Dashboard

Route::group(['prefix'=>'admin', 'middleware'=>['admin']], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    //File manager
    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');

    //About Us
    Route::get('about_us', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('about.index');
    Route::put('about_us-update', [\App\Http\Controllers\AboutUsController::class, 'aboutUpdate'])->name('about.update');

    //client section
    Route::resource('/client', \App\Http\Controllers\ClientController::class);
    Route::post('client_status', [\App\Http\Controllers\ClientController::class, 'clientstatus'])->name('client.status');

    //Category section
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::post('category_status', [\App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');
    Route::post('category/{id}/child', [\App\Http\Controllers\CategoryController::class, 'getChildByParentID']);

    //Brand section
    Route::resource('/brand', \App\Http\Controllers\BrandController::class);
    Route::post('brand_status', [\App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');

    //Product section
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::post('product_status', [\App\Http\Controllers\ProductController::class, 'productStatus'])->name('product.status');
    Route::post('product-attribute/{id}', [\App\Http\Controllers\ProductController::class, 'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroyProductAttribute'])->name('product.attribute.destroy');
    
    Route::post('product/{id}/article', [\App\Http\Controllers\ProductController::class, 'showProdById']);

    //Depot section
    Route::resource('/depots', \App\Http\Controllers\DepotController::class);
    Route::post('depots_status', [\App\Http\Controllers\DepotController::class, 'depotStatus'])->name('depots.status');

    //order section
    Route::resource('/order', \App\Http\Controllers\OrderController::class);
    Route::post('order-status', [\App\Http\Controllers\OrderController::class, 'orderStatus'])->name('order.status');
    Route::get('commande-facture/{id}', [\App\Http\Controllers\OrderController::class, 'showFacture'])->name('order.facture');
    Route::get('facture-PDF/{id}', [\App\Http\Controllers\OrderController::class, 'orderPDF'])->name('order.pdf');
    Route::get('vente-article/', [\App\Http\Controllers\OrderController::class, 'showArticle'])->name('order.vente');
    Route::get('vente-simple/', [\App\Http\Controllers\OrderController::class, 'venteSimple'])->name('order.vente.simple');

    //Fournisseur section
    Route::resource('/fournisseurs', \App\Http\Controllers\FournisseurController::class);
    Route::post('fournisseurs_status', [\App\Http\Controllers\FournisseurController::class, 'fournisseurStatus'])->name('fournisseurs.status');
   

    //User section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');

    //Coupon section
    Route::resource('/coupon', \App\Http\Controllers\CouponController::class);
    Route::post('coupon_status', [\App\Http\Controllers\CouponController::class, 'couponStatus'])->name('coupon.status');

    //Shipping section
    Route::resource('/shipping', \App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status', [\App\Http\Controllers\ShippingController::class, 'shippingStatus'])->name('shipping.status');

    //Currency section
    Route::resource('/currency', \App\Http\Controllers\CurrencyController::class);
    Route::post('currency_status', [\App\Http\Controllers\CurrencyController::class, 'currencyStatus'])->name('currency.status');

    //Settings section
    // Route::resource('/settings', \App\Http\Controllers\SettingController::class);
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'settings'])->name('settings');
    Route::put('settings', [\App\Http\Controllers\SettingController::class, 'settingsUpdate'])->name('settings.update');

    //seller section
    Route::resource('/seller', \App\Http\Controllers\SellerController::class);
    Route::post('seller_status', [\App\Http\Controllers\SellerController::class, 'sellerStatus'])->name('seller.status');
    Route::post('seller-verified', [\App\Http\Controllers\SellerController::class, 'sellerVerified'])->name('seller.verified');

	//SMTP section
	Route::get('smtp',[\App\Http\Controllers\SettingController::class, 'smtp'])->name('smtp');
	Route::post('smtp-update',[\App\Http\Controllers\SettingController::class, 'smtpUpdate'])->name('smtp.update');


    //Payment section
    Route::get('payment', [\App\Http\Controllers\SettingController::class, 'payment'])->name('payment');

    //Paypal
    Route::patch('paypal-settings-update', [\App\Http\Controllers\SettingController::class, 'paypalUpdate'])->name('paypal.setting.update');


    //calendar
    Route::get('calendar', [\App\Http\Controllers\Backend\IndexController::class, 'calendar'])->name('calendar');

    //messages
    Route::get('messages', [\App\Http\Controllers\Backend\IndexController::class, 'messages'])->name('messages');
    Route::get('messages/{id}', [\App\Http\Controllers\Backend\IndexController::class, 'messagesID'])->name('messages.ID');

    //ProductReview section
    Route::resource('/review', \App\Http\Controllers\ProductReviewController::class);
    Route::post('review_status', [\App\Http\Controllers\ProductReviewController::class, 'reviewStatus'])->name('review.status');

    //profile
    Route::get('profile', [\App\Http\Controllers\Backend\IndexController::class, 'profile'])->name('profile');
    Route::put('profile-update', [\App\Http\Controllers\Backend\IndexController::class, 'profileUpdate'])->name('profile.update');


    //front en back
    // //Cart section
    Route::get('cart', [\App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
    Route::post('cart/store', [\App\Http\Controllers\Frontend\CartController::class, 'cartStore'])->name('cart.store');
    Route::post('cart/delete', [\App\Http\Controllers\Frontend\CartController::class, 'cartDelete'])->name('cart.delete');
    Route::post('cart/update', [\App\Http\Controllers\Frontend\CartController::class, 'cartUpdate'])->name('cart.update');
    Route::get('facture-delete', [\App\Http\Controllers\Frontend\CartController::class, 'deleteFacture'])->name('facture.delete');

    //Checkout section
    Route::get('checkout1', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout1'])->name('checkout1')->middleware('user');
    Route::get('checkout2', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout2'])->name('checkout2')->middleware('user');
    Route::get('checkout3', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout3'])->name('checkout3')->middleware('user');
    Route::get('checkout4', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout4'])->name('checkout4')->middleware('user');
    Route::post('checkout-first', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout1Store'])->name('checkout1.store');
    Route::post('checkout-second', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout2Store'])->name('checkout2.store');
    Route::post('checkout-third', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout3Store'])->name('checkout3.store');
    Route::get('checkout-store', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkoutStore'])->name('checkout.store');
    Route::get('checkout-complete/{order}', [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkoutComplete'])->name('checkout.complete');

    //Coupon section
    Route::post('coupon/add', [\App\Http\Controllers\Frontend\CartController::class, 'couponAdd'])->name('coupon.add');

});

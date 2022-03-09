<?php

use Illuminate\Support\Facades\Route;

//Admin login
Route::group(['prefix'=>'seller'],function(){
    Route::get('/login',[\App\Http\Controllers\Auth\Seller\AuthController::class, 'showLoginForm'])->name('seller.login.form');
    Route::post('/login',[\App\Http\Controllers\Auth\Seller\AuthController::class, 'login'])->name('seller.login');
});


//Seller Dashboard

Route::group(['prefix'=>'seller', 'middleware'=>['seller']], function(){
    Route::get('/',[\App\Http\Controllers\Seller\SellerController::class,'dashboard'])->name('seller');

    //Product section
    Route::resource('/seller-product', \App\Http\Controllers\Seller\ProductController::class);
    Route::post('seller-product-status', [\App\Http\Controllers\Seller\ProductController::class, 'sellerProductStatus'])->name('seller.product.status');

    Route::post('seller-product/{id}/article', [\App\Http\Controllers\Seller\ProductController::class, 'showProdById']);


    //calendar
    Route::get('seller-calendar', [\App\Http\Controllers\Seller\SellerController::class, 'calendar'])->name('seller.calendar');

    //messages
    Route::get('seller-messages', [\App\Http\Controllers\Seller\SellerController::class, 'messages'])->name('seller.messages');

    //profile
    Route::get('seller-profile', [\App\Http\Controllers\Seller\SellerController::class, 'profile'])->name('seller.profile');
    Route::put('seller/profile-update', [\App\Http\Controllers\Seller\SellerController::class, 'profileUpdate'])->name('seller.profile.update');


        //order section
        Route::resource('/vendeur-order', \App\Http\Controllers\Seller\OrderController::class);
        Route::post('vendeur-order-status', [\App\Http\Controllers\Seller\OrderController::class, 'orderStatus'])->name('vendeur.order.status');
        Route::get('vendeur-commande-facture/{id}', [\App\Http\Controllers\Seller\OrderController::class, 'showFacture'])->name('vendeur.order.facture');
        Route::get('vendeur-facture-PDF/{id}', [\App\Http\Controllers\Seller\OrderController::class, 'orderPDF'])->name('vendeur.order.pdf');
        Route::get('vendeur-vente-article/', [\App\Http\Controllers\Seller\OrderController::class, 'showArticle'])->name('vendeur.order.vente');
        Route::get('vendeur-vente-simple/', [\App\Http\Controllers\Seller\OrderController::class, 'venteSimple'])->name('vendeur.order.vente.simple');

        //Checkout section
        Route::get('vendeur-checkout1', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout1'])->name('vendeur.checkout1')->middleware('seller');
        Route::get('vendeur-checkout2', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout2'])->name('vendeur.checkout2')->middleware('seller');
        Route::get('vendeur-checkout3', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout3'])->name('vendeur.checkout3')->middleware('seller');
        Route::get('vendeur-checkout4', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout4'])->name('vendeur.checkout4')->middleware('seller');
        Route::post('vendeur-checkout-first', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout1Store'])->name('vendeur.checkout1.store');
        Route::post('vendeur-checkout-second', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout2Store'])->name('vendeur.checkout2.store');
        Route::post('vendeur-checkout-third', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkout3Store'])->name('vendeur.checkout3.store');
        Route::get('vendeur-checkout-store', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkoutStore'])->name('vendeur.checkout.store');
        Route::get('vendeur-checkout-complete/{order}', [\App\Http\Controllers\Seller\CheckoutController::class, 'checkoutComplete'])->name('vendeur.checkout.complete');

        // //Cart section
        Route::get('seller-cart', [\App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('seller.cart');
        Route::post('seller-cart/store', [\App\Http\Controllers\Frontend\CartController::class, 'cartStore'])->name('seller.cart.store');
        Route::post('seller-cart/delete', [\App\Http\Controllers\Frontend\CartController::class, 'cartDelete'])->name('seller.cart.delete');
        Route::post('seller-cart/update', [\App\Http\Controllers\Frontend\CartController::class, 'cartUpdate'])->name('seller.cart.update');
        Route::get('seller-facture-delete', [\App\Http\Controllers\Frontend\CartController::class, 'deleteFacture'])->name('seller.facture.delete');
});


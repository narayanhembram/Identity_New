<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatBotController;
use App\Lib\Router;
use App\Models\Module;
use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->group(function () {
    Route::get('/', 'supportTicket')->name('ticket');
    Route::get('/new', 'openSupportTicket')->name('ticket.open');
    Route::post('/create', 'storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'replyTicket')->name('ticket.reply');
    Route::post('/close/{ticket}', 'closeTicket')->name('ticket.close');
    Route::get('/download/{ticket}', 'ticketDownload')->name('ticket.download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('blog/{slug}/{id}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');

    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');

    // blog
    Route::get('/blog', 'blog')->name('blog');
    // plan
    Route::get('/plan', 'plan')->name('plans');

    // services
    Route::get('/services', 'services')->name('services');
    Route::get('service/{slug}/{id}', 'serviceDetails')->name('service.details');
    Route::get('service/filter', 'serviceFilter')->name('service.filtered');

    // portfolio
    Route::get('portfolio/{slug}/{id}', 'portfolioDetails')->name('portfolio.details');
    Route::get('portfolio', 'fetchPortfolio')->name('portfolio');
    Route::get('portfolio/filter', 'portfolioFilter')->name('portfolio.filtered');

    // subscriber
    Route::post('/subscribe', 'subscribe')->name('subscribe');

    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');

    //Chatbot
    Route::post('get_module', [ChatBotController::class, 'getModule'])->name('getModule');
    Route::post('get_category', [ChatBotController::class, 'get_category'])->name('get_category');
    Route::post('get_subcategory', [ChatBotController::class, 'get_subcategory'])->name('get_subcategory');
});
// Route::match(['get', 'post'], '/botman/web', [BotManController::class,'handle']);

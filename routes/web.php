<?php

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

Route::get('/', 'App\Livewire\User\Home\Home')->name('homepage');
Route::get('/search/detail/{slug}', 'App\Livewire\User\Home\HomeShow')->name('detailProperti');
Route::get('/search/{slug?}', 'App\Livewire\User\Search\Search')->name('search');
Route::get('/kategori/{slug}', 'App\Livewire\User\Kategori\KategoriDetail')->name('kategoriDetail');
Route::get('/tentang-kami', 'App\Livewire\User\Page\TentangKami')->name('tentangKami');
Route::get('/faq', 'App\Livewire\User\Page\Faq')->name('faq');
Route::get('/booking', 'App\Livewire\User\Booking\Booking')->name('booking')->middleware('auth');
Route::get('/wishlist', 'App\Livewire\User\Wishlist\Wishlist')->name('wishlist')->middleware('auth');
Route::get('/login', 'App\Livewire\User\Auth\Login')->name('login');
Route::get('/register', 'App\Livewire\User\Auth\Register')->name('register');


Route::post('/admin/logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->middleware('auth')->name('admin.logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home-list', 'App\Livewire\Admin\Homelist\Index')->name('homeList');
    Route::get('/admin/home-list/add', 'App\Livewire\Admin\Homelist\Add')->name('homeListAdd');
    Route::get('/admin/home-list/edit/{id}', 'App\Livewire\Admin\Homelist\Edit')->name('homeListEdit');
    
    Route::get('/admin/list-user', 'App\Livewire\Admin\ListUser\Index')->name('listUser');
    Route::get('/admin/list-user/add', 'App\Livewire\Admin\ListUser\Add')->name('listUserAdd');
    Route::get('/admin/list-user/edit/{id}', 'App\Livewire\Admin\ListUser\Edit')->name('listUserEdit');

    Route::get('/admin/home-category', 'App\Livewire\Admin\ListCategory\Index')->name('homeCategory');
    Route::get('/admin/home-category/add', 'App\Livewire\Admin\ListCategory\Add')->name('homeCategoryAdd');
    Route::get('/admin/home-category/edit/{id}', 'App\Livewire\Admin\ListCategory\Edit')->name('homeCategoryEdit');

    Route::get('/admin/list-booking', 'App\Livewire\Admin\ListBooking\Index')->name('listBooking');
    Route::get('/admin/list-booking/edit/{id}', 'App\Livewire\Admin\ListBooking\Edit')->name('listBookingEdit');

    Route::get('/admin/block', 'App\Livewire\Admin\Block\Index')->name('blockIndex');
    Route::get('/admin/block/add', 'App\Livewire\Admin\Block\Add')->name('blockAdd');
    Route::get('/admin/block/edit/{id}', 'App\Livewire\Admin\Block\Edit')->name('blockEdit');

    Route::get('/admin/faq', 'App\Livewire\Admin\Faq\Index')->name('faqIndex');
    Route::get('/admin/faq/add', 'App\Livewire\Admin\Faq\Add')->name('faqAdd');
    Route::get('/admin/faq/edit/{id}', 'App\Livewire\Admin\Faq\Edit')->name('faqEdit');

    Route::get('/admin/faq-category', 'App\Livewire\Admin\FaqCategory\Index')->name('faqCategoryIndex');
    Route::get('/admin/faq-category/add', 'App\Livewire\Admin\FaqCategory\Add')->name('faqCategoryAdd');
    Route::get('/admin/faq-category/edit/{id}', 'App\Livewire\Admin\FaqCategory\Edit')->name('faqCategoryEdit');

    Route::get('/admin/setting', 'App\Livewire\Admin\Setting\Index')->name('setting');
    Route::get('/admin/setting/edit/{id}', 'App\Livewire\Admin\Setting\Edit')->name('settingEdit');
});
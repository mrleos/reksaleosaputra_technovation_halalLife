<?php

use App\Http\Controllers\backend\AdminDashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CekStatus;
use App\Http\Middleware\GetVisitor;
use App\Http\Middleware\verifikasi;
use App\Models\Menu;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalVisit = Visitor::count();
    $user = User::count();
    $title = 'Dashboard';
    $home = 'active';
    $food = Menu::where('category', 'food')->paginate(10);
    $drink = Menu::where('category', 'drink')->paginate(10);
    return view('frontend.index', compact('home','food', 'drink', 'title', 'user', 'totalVisit'));
})->middleware(GetVisitor::class);

Route::get('/dashboard', function () {
    $totalVisit = Visitor::count();
    $user = User::count();
    $title = 'Dashboard';
    $home = 'active';
    return view('frontend.index', compact('home', 'title', '$user', 'totalVisit'));
})->middleware(CekStatus::class, GetVisitor::class)->name('dashboard');

Route::get('/about', [DashboardController::class, 'about'])->middleware(verifikasi::class)->name('about.index');
Route::get('/menu', [DashboardController::class, 'menu'])->name('menu.index');
Route::get('/detail/{id}', [DashboardController::class, 'detail'])->name('detail');
Route::get('/history', [DashboardController::class, 'history'])->name('history');
Route::post('/search', [DashboardController::class, 'search'])->name('search');
Route::get('/order/status', [DashboardController::class, 'order'])->name('order.status');

Route::get('/cart', [OrderController::class, 'index'])->middleware(verifikasi::class)->name('cart.index');
Route::post('/cart', [OrderController::class, 'store'])->middleware(verifikasi::class)->name('cart.store');
Route::get('/cart/{id}', [OrderController::class, 'destroy'])->middleware(verifikasi::class)->name('cart.destroy');

Route::get('/payment/{id}', [PaymentController::class, 'showPayment'])->middleware(verifikasi::class)->name('payment.show');
Route::post('/payment', [PaymentController::class, 'processPayment'])->middleware(verifikasi::class)->name('processPayment');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->middleware(verifikasi::class)->name('payment.success');

Route::get('/comment/{id}', [CommentController::class, 'index'])->middleware(verifikasi::class)->name('comment');
Route::post('/comment', [CommentController::class, 'store'])->middleware(verifikasi::class)->name('comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/AdminDashboard', [AdminDashboardController::class, 'index'])->name('admin.index');
Route::post('/CreateMenu', [MenuController::class, 'store'])->name('menu.store');
Route::delete('/DeleteMenu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::get('/EditMenu/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/UpdateMenu/{id}', [MenuController::class, 'update'])->name('menu.update');

Route::get('/UserMenu', [AdminDashboardController::class, 'userMenu'])->name('user.index');
Route::get('/UserOrder', [AdminDashboardController::class, 'userOrder'])->name('order.index');
Route::get('/UserPost', [AdminDashboardController::class, 'userPost'])->name('post.index');
Route::post('/UserPost/{id}', [AdminDashboardController::class, 'postStatus'])->name('post.status');
Route::post('/UserOrder/{id}', [AdminDashboardController::class, 'orderStatus'])->name('order');
Route::get('/EditUser/{id}', [AdminDashboardController::class, 'userEdit'])->name('user.edit');
Route::delete('/DeleteUser/{id}', [AdminDashboardController::class, 'userDestroy'])->name('user.destroy');
Route::put('/UpdateUser/{id}', [AdminDashboardController::class, 'userUpdate'])->name('user.update');

Route::post('/post', [PostController::class, 'store'])->name('post.create');
Route::post('/post/{post}/comment', [PostCommentController::class, 'store'])->name('commentPost.store');

require __DIR__.'/auth.php';

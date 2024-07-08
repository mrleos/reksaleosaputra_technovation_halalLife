<?php

use App\Http\Controllers\backend\AdminDashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\LikeController;
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
    $all = Menu::latest()->take(8)->get();
    $food = Menu::where('category', 'makanan')->take(8)->get();
    $cosmetic = Menu::where('category', 'kosmetik')->take(8)->get();
    $clothes = Menu::where('category', 'pakaian')->take(8)->get();
    return view('frontend.index', compact('home','food', 'clothes', 'title', 'user', 'totalVisit', 'all', 'cosmetic'));
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
Route::post('/about', [DashboardController::class, 'postSearch'])->name('post.search');

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
Route::post('/UserAdd', [AdminDashboardController::class, 'addUser'])->name('user.add');
Route::get('/UserOrder', [AdminDashboardController::class, 'userOrder'])->name('order.index');
Route::get('/UserPost', [AdminDashboardController::class, 'userPost'])->name('post.index');
Route::post('/UserPost/{id}', [AdminDashboardController::class, 'postStatus'])->name('post.status');
Route::post('/UserOrder/{id}', [AdminDashboardController::class, 'orderStatus'])->name('order');
Route::delete('/DeleteUser/{id}', [AdminDashboardController::class, 'userDestroy'])->name('user.destroy');

Route::post('/post', [PostController::class, 'store'])->name('post.create');
Route::post('/post/{post}/comment', [PostCommentController::class, 'store'])->name('commentPost.store');
Route::post('/like/{post}', [LikeController::class, 'toggleLike'])->name('post.like');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\AdminPostController;

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

Route::get('/', [PostController::class, 'index']);
Route::post('save-comment',[PostController::class, 'save_comment']);
Route::get('/posts/{post_id}', [PostController::class, 'singlepage']);
Route::get('/posting/{location}', [PostController::class, 'singlelocation']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile/edit', [ProfileController::class, 'update']);
Route::post('/profile/delete', [ProfileController::class, 'delete']);
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resources([
        'blogs' => BlogController::class,
        'comments' => CommentController::class,
        'location' => LocationController::class,
        'categories' => CategoryController::class,
        'post' => AdminPostController::class,
        'users' => UserController::class
    ]);

});
Route::get('/dashboard', [DashboardController::class,'index']);

?>
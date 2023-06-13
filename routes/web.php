<?php


use Illuminate\Support\Facades\Auth;
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

// Main
Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', 'IndexController')->name('index');
});

//Login UI
Route::get('/login', 'HomeController@index');
Route::get('/register', 'HomeController@index');

//Single post
Route::namespace('App\Http\Controllers\SinglePost')->group(function () {
    //   Route::get('/', 'IndexController')->name('single.post');
    Route::get('/{post}', 'ShowController')->name('single.post.show');
    Route::prefix('{post}/comment')->group(function () {
        Route::post('/store', 'StoreController')->name('single.post.store');
    });
    Route::prefix('{post}/like')->group(function () {
        Route::post('/', 'LikeController')->name('single.post.like');
    });
});

//Admin
Route::namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('home', 'IndexController')->name('admin.home');
    });
// Categories
    Route::namespace('Category')->prefix('categories')->group(function () {
        Route::get('/', 'IndexController')->name('admin.categories');
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/store', 'StoreController')->name('admin.categories.store');
        Route::get('/{category}', 'ShowController')->name('admin.categories.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.categories.delete');
    });
//Tags
    Route::namespace('Tag')->prefix('tags')->group(function () {
        Route::get('/', 'IndexController')->name('admin.tags');
        Route::get('/create', 'CreateController')->name('admin.tags.create');
        Route::post('/store', 'StoreController')->name('admin.tags.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tags.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tags.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tags.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tags.delete');
    });

    // Posts
    Route::namespace('Post')->prefix('posts')->group(function () {
        Route::get('/', 'IndexController')->name('admin.posts');
        Route::get('/create', 'CreateController')->name('admin.posts.create');
        Route::post('/store', 'StoreController')->name('admin.posts.store');
        Route::get('/{post}', 'ShowController')->name('admin.posts.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.posts.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.posts.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.posts.delete');

        Route::prefix('{post}/comment')->group(function () {
            Route::delete('/delete', 'CommentDestroyController')->name('admin.comment.delete');
        });
    });

    // Users
    Route::namespace('User')->prefix('users')->group(function () {
        Route::get('/', 'IndexController')->name('admin.users');
        Route::get('/create', 'CreateController')->name('admin.users.create');
        Route::post('/store', 'StoreController')->name('admin.users.store');
        Route::get('/{user}', 'ShowController')->name('admin.users.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.users.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.users.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.users.delete');
    });
});

//Personal Cabinet
Route::namespace('App\Http\Controllers\Personal')->middleware('auth')->prefix('personal')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('home', 'IndexController')->name('personal.home');
    });

    Route::namespace('Comment')->prefix('comments')->group(function () {
        Route::get('/', 'IndexController')->name('personal.comments');
        Route::get('/create', 'CreateController')->name('personal.comments.create');
        Route::post('/store', 'StoreController')->name('personal.comments.store');
        Route::get('/{comment}', 'ShowController')->name('personal.comments.show');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comments.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comments.update');
        Route::delete('/{comment}', 'DestroyController')->name('personal.comments.delete');
    });

    Route::namespace('Like')->prefix('likes')->group(function () {
        Route::get('/', 'IndexController')->name('personal.likes');
        Route::delete('/{like}', 'DestroyController')->name('personal.likes.delete');
    });
});
Auth::routes(['verify' => true]); //включаем сценарий подтверждения почты
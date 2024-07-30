<?php

use App\Http\Controllers\Livestock247Controller;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
Route::get('/', [Livestock247Controller::class,'index'])->name('home');
Route::get('about-us', [Livestock247Controller::class, 'about_us'])->name('about-us');
Route::get('blogs/{id?}',[Livestock247Controller::class, 'blogs'])->name('blogs');
Route::get('blog/{id?}', [Livestock247Controller::class, 'blog'])->name('blog');
Route::get('hoina', [Livestock247Controller::class, 'hoina'])->name('hoina');
Route::get('meat247', [Livestock247Controller::class, 'meat247'])->name('meat247');
Route::get('aims', [Livestock247Controller::class, 'aims'])->name('aims');
Route::get('faq', [Livestock247Controller::class, 'faq'])->name('faq');
Route::get('livestalk', [Livestock247Controller::class, 'livestalk'])->name('livestalk');
Route::get('get-in-touch',[Livestock247Controller::class, 'get_in_touch'])->name('get-in-touch');
Route::post('get-in-touch',[Livestock247Controller::class, 'get_in_touch'])->name('get-in-touch');
Route::post('time-spent',[Livestock247Controller::class, 'time_spent'])->name('time-spent');
Route::post('last-read-time', [Livestock247Controller::class, 'last_read_time'])->name('last-read-time');


Route::group(['middleware'=>'guest'], function(){
    Route::get('login', [AccessController::class, 'login'])->name('login');
    Route::post('login', [AccessController::class, 'loginPost'])->name('login');
    Route::get('signup', [AccessController::class, 'signup'])->name('signup');
    Route::post('signup', [AccessController::class, 'signupPost'])->name('signup');
    Route::get('forgot-password', [AccessController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AccessController::class, 'forgotPassword']);
    Route::get('change-password/{name?}', [AccessController::class, 'changePassword'])->name('change-password')->where('name','.*');
    Route::post('password', [AccessController::class, 'password'])->name('password');
});

Route::group(["middleware"=>"auth","preventBackHistory"],function(){
    Route::get('logout', [AccessController::class, 'logout'])->name('logout');
    Route::post('logout', [AccessController::class, 'logout'])->name('logout');
    Route::get('create-user', [AccessController::class, 'createUser'])->name('create-user');
    Route::post('create-user', [AccessController::class, 'createUser'])->name('create-user');
    Route::get('users', [AccessController::class, 'users'])->name('users');   
    Route::get('dashboard',[AccessController::class, 'index'])->name('dashboard')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::get('profile', [AccessController::class, 'setupProfile'])->name('profile')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::post('profile', [AccessController::class, 'setupProfile'])->name('profile');
    Route::get('reset-password', [AccessController::class, 'resetPassword'])->name('reset-password')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::post('reset-password', [AccessController::class,'resetPassword'])->name('reset-password');
    Route::get('create-post', [AccessController::class, 'createPost'])->name('create-post')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::post('create-post', [AccessController::class, 'createPost'])->name('create-post');
    Route::get('posts', [AccessController::class, 'posts'])->name('posts')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::post('posts', [AccessController::class, 'posts'])->name('posts');
    Route::get('post/{id}', [AccessController::class, 'post'])->name('post')->where('id','.*')->middleware('role:ROLE_SUPERADMIN,ROLE_ADMIN');
    Route::post('post/{id}', [AccessController::class, 'post'])->name('post')->where('id','.*');
    Route::delete('delete-post/{id}', [AccessController::class, 'deletePost']);
    Route::post('lock_user', [AccessController::class, 'lockUser'])->name('lock_user');
    Route::get('number_of_users', [AccessController::class, 'numberOfUsers'])->name('numberOfUsers');
    Route::get('number_of_locked_users', [AccessController::class, 'numberOfLockedUsers'])->name('numberOfLockedUsers');
    Route::get('number_of_blog_post', [AccessController::class, 'numberOfBlogPost'])->name('numberOfBlogPost');
    Route::get('number_of_deleted_post', [AccessController::class, 'numberOfDeletedPost'])->name('numberOfDeletedPost');
});

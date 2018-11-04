<?php

// User-based Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/post-{id}', 'HomeController@item')->name('item');

// Admin Routes
Route::middleware(['auth', 'restrict'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::post('settings', 'AdminController@updateSettings')->name('admin.updateSettings');
        Route::get('styling', 'AdminController@styling')->name('admin.styling');
        Route::post('styling', 'AdminController@stylingUpdate');

        Route::get('dashboard/action:new', 'AdminController@new')->name('item.new');
        Route::post('dashboard/action:new', 'AdminController@post_new')->name('item.post-new');

        Route::get('dashboard/action:trash={id}', 'AdminController@confirmTrash')->name('item.trash');
        Route::post('dashboard/action:trash={id}', 'AdminController@trash');
        Route::get('dashboard/action:modify={id}', 'AdminController@modify')->name('item.modify');
        Route::post('dashboard/action:update', 'AdminController@update')->name('item.update');

        Route::get('dashboard/data:items', 'AdminController@ajaxReqItems');

    });

});

Route::prefix('api')->group(function () {

    Route::get('image:{id}', 'ApiController@image')->name('api.image');

});

// Auth Routes
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/home', function(){
    return redirect("/admin/dashboard");
});

Route::post('admin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
<?php

Route::group(['as' => 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::resource('page', 'PageController', ['except' => 'show']);
    //Route::resource('post', 'PostController', ['except' => 'show']);
    Route::resource('tag', 'TagController', ['except' => 'show']);
    Route::resource('category', 'CategoryController', ['except' => 'show']);
    Route::resource('snippet', 'SnippetController', ['except' => 'show']);
});

Route::get('{uri}', 'RouteController')->where('uri', '(.*)');
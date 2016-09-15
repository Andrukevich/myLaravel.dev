<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::post('form', ['as' => 'post.form', 'uses' => 'TestController@postForms']);
Route::get('form', ['as' => 'form', 'uses' => 'TestController@forms']);


Route::group(['prefix' => 'db'], function($route){
   $route->get('insert', 'DbController@insert');
   $route->get('update', 'DbController@update');
   $route->get('delete', 'DbController@delete');
   $route->get('select', 'DbController@select');
    $route->get('model', 'DbController@model');
});

Route::group(['namespace' => 'Orders', 'prefix' => 'slaves'], function($route){
    $route->get('list', ['uses' => 'OrderController@orderList', 'as' => 'slaves.list']);
    $route->get('order/{id}/show', ['uses' => 'OrderController@order', 'as' => 'slaves.order']);
});

Route::group(['prefix' => 'admin-panel', 'namespace' => 'Admin'], function($route){
    Route::group(['prefix' => 'order'], function($route){
        $route->get('index', ['uses' => 'AdminOrderController@index', 'as' => 'order.index']);
        $route->get('create', ['uses' => 'AdminOrderController@create', 'as' => 'order.create']);
        $route->post('store', ['uses' => 'AdminOrderController@store', 'as' => 'order.store']);
        $route->get('{order}/edit', ['uses' => 'AdminOrderController@edit', 'as' => 'order.edit']);
        $route->put('{order}/upgrade', ['uses' => 'AdminOrderController@upgrade', 'as' => 'order.upgrade']);
    });
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

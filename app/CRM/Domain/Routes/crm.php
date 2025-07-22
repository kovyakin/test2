<?php


use App\CRM\Infrastructure\Http\Controllers\OrderController;
use App\CRM\Infrastructure\Http\Controllers\StocksController;
use App\CRM\Infrastructure\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

// Просмотреть список складов
Route::get('/warehouse', WarehouseController::class)->name('warehouse');
// Просмотреть список товаров с их остатками по складам
Route::get('/stocks', StocksController::class)->name('stocks');
// Получить список заказов (с фильтрами и настраиваемой пагинацией)
Route::get('/orders', [OrderController::class,'index'])->name('orders');

Route::post('/orders', [OrderController::class,'create'])->name('orders.store')
    ->middleware('api');

//Route::get('/orders/create ', [OrderController::class,'index'])->name('orders.index');

//
//GET|HEAD        orders ....................orders.index › App\CRM\Infrastructure\Http\Controllers\OrderController@index
//  POST            orders ................... orders.store › App\CRM\Infrastructure\Http\Controllers\OrderController@store
//  GET|HEAD        orders/create .......... orders.create › App\CRM\Infrastructure\Http\Controllers\OrderController@create
//  GET|HEAD        orders/{order} ............. orders.show › App\CRM\Infrastructure\Http\Controllers\OrderController@show
//  PUT|PATCH       orders/{order} ......... orders.update › App\CRM\Infrastructure\Http\Controllers\OrderController@update
//  DELETE          orders/{order} ....... orders.destroy › App\CRM\Infrastructure\Http\Controllers\OrderController@destroy
//  GET|HEAD        orders/{order}/edit ........ orders.edit › App\CRM\Infrastructure\Http\Controllers\OrderController@edit

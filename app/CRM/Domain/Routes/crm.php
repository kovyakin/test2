<?php


use App\CRM\Infrastructure\Http\Controllers\OrderController;
use App\CRM\Infrastructure\Http\Controllers\StocksController;
use App\CRM\Infrastructure\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['api']], function () {
// Просмотреть список складов
    Route::get('/warehouse', WarehouseController::class)->name('warehouse');
// Просмотреть список товаров с их остатками по складам
    Route::get('/stocks', StocksController::class)->name('stocks');
// Получить список заказов (с фильтрами и настраиваемой пагинацией)
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::post('/orders', [OrderController::class, 'create'])->name('orders.store');

});

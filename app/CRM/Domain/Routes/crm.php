<?php

use App\CRM\Infrastructure\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::get('/warehouse',[WarehouseController::class,'index'])->name('warehouse.index');

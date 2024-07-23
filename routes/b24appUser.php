<?php

use Illuminate\Support\Facades\Route;

/**
 * Роуты для хождение в рамках приложения с отключенной проверкой CsrfToken, если пользователь не авторизован, будет создан пользователь и авторизован
 * Для приложений с интерфейсом
 */

Route::post('/app','\App\Http\Controllers\B24Controller@index');

Route::post('/custom','\App\Http\Controllers\B24Controller@custom');

<?php

use Illuminate\Support\Facades\Route;

/**
 * Роуты для приложений типа: использует только API
 */

Route::match(['post'],'/install','\App\Http\Controllers\B24InstallController@install');

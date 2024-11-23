<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsApiController;

Route::post('/appointments', [AppointmentsApiController::class, 'store']);


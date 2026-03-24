<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/health', function () {
    return response()->json([
        'status' => 'OK',
        'message' => 'Application is running',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
});

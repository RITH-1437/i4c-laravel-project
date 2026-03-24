<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'name' => 'Laravel Application',
        'status' => 'running',
        'version' => '10.x'
    ]);
});

Route::get('/health', function () {
    return response()->json([
        'status' => 'OK',
        'message' => 'Application is running'
    ]);
});

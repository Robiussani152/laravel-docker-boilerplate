<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redis-test', function () {
    Redis::set('test-key', 'Redis is working!');
    return Redis::get('test-key');
});

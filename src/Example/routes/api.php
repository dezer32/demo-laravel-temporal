<?php

use Dezer32\Temporal\Laravel\Example\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/simple-activity', [ExampleController::class, 'simpleActivity'])
    ->name('simple-activity');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

Route::post('customer/file_upload','App\Http\Controllers\Api\CustomerController@store');




<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Phpml\Classification\KNearestNeighbors;

Route::get('/', function () {



    $samples = [[1, 2], [1, 3], [1, 4], [2, 5], [3, 2], [4, 5]];
    $labels = ['a', 'a', 'a', 'b', 'b', 'b'];

    $classifier = new KNearestNeighbors();
    $classifier->train($samples, $labels);

    $r = $classifier->predict([1, 4]);

    print_r($r);

    return view('welcome');
});

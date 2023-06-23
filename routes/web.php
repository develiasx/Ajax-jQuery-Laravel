<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PeopleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');



Route::resource('people', App\Http\Controllers\PeopleController::class);

Route::post('ajax', function () {

    $meses = [
        'Janeiro' => '2500',
        'Fevereiro' => '6000',
        'Marco' => '400',
        'Abril' => '570',
        'Maio' => '700',
        'Junho' => '1200',
        'Julho' => '2450',
        'Agosto' => '1100',
        'Setembro' => '800',
        'Outubro' => '540',
        'Novembro' => '670',
        'Dezembro' => '400',
    ];

    $data = [];

    foreach($meses as $key => $value){
        $item = [
            'month' => $key,
            'value' => (int) rand(100,10000)
        ];
        $data[] = $item;
    } 

    echo json_encode($data);
    
})->name('ajax'); 
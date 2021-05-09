<?php

use App\Http\Livewire\DatainfoTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

Route::get('/', function () {

    $isColletion = DB::connection('mongodb')->collection('fb-data')->count();

    
    if ($isColletion < 0) {
        Schema::connection('mongodb')->dropIfExists('fb-data');

        Schema::connection('mongodb')->create('fb-data', function ($collection) {
            $collection->index('celular');
            $collection->index('fbid');
            $collection->index('nombre');
            $collection->index('apellido');
            $collection->index('genero');
            $collection->index('ciudad');
            $collection->index('ubicacion');
            $collection->index('civil');
            $collection->index('trabajo');
            $collection->index('fecha');
        });
        DB::connection('mongodb')
            ->collection('fb-data')
            ->insert([
                'celular' => 'Test',
                'fbid' => 'Test',
                'nombre' => 'Test',
                'apellido' => 'Test',
                'genero' => 'Test',
                'ciudad' => 'Test',
                'ubicacion' => 'Test',
                'civil' => 'Test',
                'trabajo' => 'Test',
                'fecha' => 'Test'
            ]);
    }

    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/colombia', DatainfoTable::class)
    ->name('colombia');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/colombiaSearch', function (Request $request) {
        $name = (strlen($request->primer_nombre) > 0) ? $request->primer_nombre : null;
        if (is_null($name)) {
            $name = (strlen($request->segundo_nombre) > 0) ? $request->segundo_nombre : '';
        } else {
            $name = (strlen($request->segundo_nombre) > 0) ? $name . ' ' . $request->segundo_nombre : $name;
        }

        $nameLast = (strlen($request->primer_apellido) > 0) ? $request->primer_apellido : null;
        if (is_null($nameLast)) {
            $nameLast = (strlen($request->segundo_apellido) > 0) ? $request->segundo_apellido : '';
        } else {
            $nameLast = (strlen($request->segundo_apellido) > 0) ? $nameLast . ' ' . $request->segundo_apellido : $nameLast;
        }

        $gender = (is_null($request->genero)) ? '' : $request->genero;
        $city = (strlen($request->ciudad) > 0) ? $request->ciudad : '';
        $location = (strlen($request->ubicacion) > 0) ? $request->ubicacion : '';
        $civil = (is_null($request->civil)) ? '' : $request->civil;

        return redirect('/colombia?perPage=5&searchName=' . $name . '&searchLast=' . $nameLast . '&searchLocation=' . $location . '&searchCity=' . $city . '&searchGender=' . $gender . '&searchCivil=' . $civil . ' ');
    });

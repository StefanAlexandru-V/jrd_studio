<?php

use App\Models\Serviciu;
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

Route::get('/', function () {
    if (auth()->user()) {
        return redirect('/dashboard');
    }
    return redirect('/register');
});

Route::get('/dashboard', function () {
    $servicii = Serviciu::with('cerere')->get();
    return view('dashboard')->with([
        'servicii' => $servicii,
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('comanda', \App\Http\Controllers\ComandaController::class)->middleware('auth');
Route::resource('cerere', \App\Http\Controllers\CerereController::class)->middleware('auth');
Route::resource('factura', \App\Http\Controllers\FacturaController::class)->middleware('auth');
Route::resource('serviciu', \App\Http\Controllers\ServiciuController::class)->middleware('auth');
Route::resource('message', \App\Http\Controllers\MessageController::class)->middleware('auth');
Route::resource('firma', \App\Http\Controllers\FirmaController::class)->middleware('auth');
Route::get('/admin', function () {
    if (auth()->user() && auth()->user()->tip == 'super') {
        $path = app_path() . "/Models";
//        $entities = getModels($path);
        $entities = [
            'cerere',
            'comanda',
            'serviciu',
        ];
        $operatiuni = getCRUD();

        return view('admin')->with([
            'entitati' => $entities,
            'operatiuni' => $operatiuni,
        ]);
    }
    return view('auth.login');
})->name('admin');

function getModels($path): array
{
    $out = [];
    $results = scandir($path);
    foreach ($results as $result) {
        if ($result === '.' or $result === '..') continue;
        $filename = $path . '/' . $result;
        if (is_dir($filename)) {
            $out = array_merge($out, getModels($filename));
        }else{
            $out[] = strtolower(explode('/',substr($filename,0,-4))[7]);

        }
    }
    return $out;
}

function getCRUD() {
    $operatiuni = [
        'create', 'index'
    ];

    return $operatiuni;
}
Route::post('/genereaza-comanda/{cerere}', [\App\Http\Controllers\CerereController::class, 'genereazaComanda'])->name('genereaza-comanda')->middleware('auth');
Route::get('/incarca-cereri/{cerere}', [\App\Http\Controllers\CerereController::class, 'incarcaCereri'])->name('incarca-cereri')->middleware('auth');
Route::get('/genereaza-factura/{comanda}', [\App\Http\Controllers\ComandaController::class, 'genereazaFactura'])->name('genereaza-factura')->middleware('auth');
Route::get('/genereaza-raport-cerere', [\App\Http\Controllers\CerereController::class, 'genereazaRaport'])->name('genereaza-raport-cereri')->middleware('auth');
Route::get('/genereaza-raport-comanda', [\App\Http\Controllers\ComandaController::class, 'genereazaRaport'])->name('genereaza-raport-comenzi')->middleware('auth');
Route::get('/genereaza-raport-factura', [\App\Http\Controllers\FacturaController::class, 'genereazaRaport'])->name('genereaza-raport-facturi')->middleware('auth');
Route::get('/contact', [\App\Http\Controllers\MessageController::class, 'contact'])->name('contact');
Route::put('/sterge-mesaje', [\App\Http\Controllers\MessageController::class, 'stergeMesaje'])->name('sterge-mesaje')->middleware('auth');
Route::post('/image-upload', [\App\Http\Controllers\ServiciuController::class, 'imageUpload'])->name('image-upload')->middleware('auth');
Route::get('/about', function () {
    return view('about');
});

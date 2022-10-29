<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;

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
//
Route::get('/', function () {
    return redirect()->route('contact.index');
});


Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/contact',ContactController::class);
    Route::resource('/store',StoreController::class);
    Route::post('/multipleDestroy',[ContactController::class,'multipleDestroy'])->name('multipleDestroy');
    Route::post('/task/{duplicate_id}/clone',[ContactController::class,'duplicate'])->name('duplicate.clone');
    Route::post('/multipleDuplicate',[ContactController::class,'multipleDuplicate'])->name('multipleDuplicate');
});

Route::get('/file-import',[ContactController::class,
    'importView'])->name('import-view');
Route::post('/import',[ContactController::class,
    'import'])->name('import');
Route::get('/export-users',[ContactController::class,
    'exportContacts'])->name('export-contacts');

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FeatureController;

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
    Route::post('/multipleDestroy',[FeatureController::class,'multipleDestroy'])->name('multipleDestroy');
    Route::post('/task/{duplicate_id}/clone',[FeatureController::class,'duplicate'])->name('duplicate.clone');
    Route::post('/multipleDuplicate',[FeatureController::class,'multipleDuplicate'])->name('multipleDuplicate');
    Route::post('/export/{export_id}/excel',[FeatureController::class,'export'])->name('export.excel');
    Route::post('/multipleExport',[FeatureController::class,'multipleExport'])->name('multipleExport');
    Route::post('/exportAll',[FeatureController::class,'exportAll'])->name('exportAll');
});


//laravel excel
Route::get('/file-import',[FeatureController::class,'importView'])->name('import-view');
Route::post('/import',[FeatureController::class, 'import'])->name('import');
Route::post('/export-users',[FeatureController::class, 'exportContacts'])->name('export-contacts');

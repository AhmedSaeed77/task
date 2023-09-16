<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlbumController;


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
    return view('welcome');
});

    Route::group(['prefix' => 'album', 'as' => 'album.'], function () {
    Route::get('/', [AlbumController::class, 'index'])->name('index');
    Route::get('/Datatable', [AlbumController::class, 'datatable'])->name('albumDatatable');
    Route::get('/store', [AlbumController::class, 'add'])->name('albumadd');
    //Route::post('/storex', [AlbumController::class, 'store'])->name('albumstore');
    Route::post('/store', [AlbumController::class, 'storedata'])->name('albumstoredata');
    Route::get('/edit/{id}', [AlbumController::class, 'edit'])->name('albumedit');
    Route::post('/update/{id}', [AlbumController::class, 'update'])->name('albumupdate');
    Route::post('/delete', [AlbumController::class, 'delete'])->name('albumdelete');
    Route::get('/deleteandmove/{id}', [AlbumController::class, 'deleteandmove'])->name('deleteandmove');
        
            });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


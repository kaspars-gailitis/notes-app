<?php
use App\Note;
use App\User;
use Illuminate\Http\Request;

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
Route::get('set/{locale}', function ($locale) {
  \Session::put('locale', $locale);
  return redirect()->back();
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/text', function (){
    return view('textTest');
});
Auth::routes();
Route::get('/home', function(){
    return redirect('home/2');
})->middleware('auth');
Route::get('/home/{sort}', 'NotesController@index')->middleware('auth');
Route::get('new/note', 'NotesController@newNote')->middleware('auth');
Route::get('show/{id}', 'NotesController@show')->middleware('auth');
Route::post('edit/{id}', 'NotesController@edit')->middleware('auth');
Route::put('update/{id}', 'NotesController@update')->middleware('auth');
Route::get('/clusters', 'ClusterController@index')->middleware('auth');
Route::get('/clusters/create', 'ClusterController@create')->middleware('auth');
Route::get('/tasks', 'NotesController@tasks')->middleware('auth');
Route::delete('delete/{id}', 'NotesController@destroy')->middleware('auth');
Route::post('store/{type}', 'NotesController@store')->middleware('auth');
Route::post('/cluster/new', 'ClusterController@store')->middleware('auth');
Route::get('/cluster/show/{id}', 'ClusterController@show')->middleware('auth');

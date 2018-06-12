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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/text', function (){
    return view('textTest');
});
Auth::routes();
Route::get('/home', 'NotesController@index')->middleware('auth');
Route::get('new/note', 'NotesController@newNote')->middleware('auth');

Route::get('show/{id}', 'NotesController@show')->middleware('auth');
Route::post('edit/{id}', 'NotesController@edit')->middleware('auth');
Route::put('update/{id}', 'NotesController@update')->middleware('auth');
Route::get('new/colab', 'NotesController@newColab')->middleware('auth');
Route::get('/tasks', 'NotesController@tasks')->middleware('auth');
Route::delete('delete/{id}', 'NotesController@destroy')->middleware('auth');
Route::post('store/{type}', 'NotesController@store')->middleware('auth');

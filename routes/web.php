<?php

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
    if(Auth::check()){
        return redirect(route('home'));
    }
    return view('auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('alternatifs', 'AlternatifController');
Route::post('alternatifs/hapus', 'AlternatifController@hapus')->name('alternatifs.hapus');

Route::resource('kriterias', 'KriteriaController');
Route::post('kriterias/hapus', 'KriteriaController@hapus')->name('kriterias.hapus');

Route::resource('nilaiKriterias', 'NilaiKriteriaController');
Route::post('nilaiKriterias/hapus', 'NilaiKriteriaController@hapus')->name('nilaiKriterias.hapus');

Route::resource('nilaiAlternatifKriterias', 'NilaiAlternatifKriteriaController');
Route::get('nilaiAlternatifKriterias/create/{id}', 'NilaiAlternatifKriteriaController@createByKriteria')->name('createByKriteria');
Route::post('nilaiAlternatifKriterias/hapus', 'NilaiAlternatifKriteriaController@hapus')->name('nilaiAlternatifKriterias.hapus');

Route::get('hasil', 'HasilController@index')->name('hasil.index');
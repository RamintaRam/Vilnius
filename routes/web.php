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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', ['as' => 'app.inhabitants.index', 'uses' => 'InhabitantsController@index']);

//
//return;

Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

//
//Route::get('/create', function () {
//    return view('create');
//});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth']], function () {
    Route::get('/', ['as' => 'app.inhabitants.index', 'uses' => 'InhabitantsController@index']);



    Route::group(['prefix' => 'gimimo-metai'], function () {

        Route::get('/', ['as' => 'app.year.index', 'uses' => 'YearOfBirthController@index']);
        Route::get('/create', ['as' => 'app.year.create', 'uses' => 'YearOfBirthController@create']);
        Route::post('/create', ['uses' => 'YearOfBirthController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.year.show', 'uses' => 'YearOfBirthController@show']);
            Route::get('/edit', ['as' => 'app.year.edit', 'uses' => 'YearOfBirthController@edit']);
            Route::post('/edit', ['uses' => 'YearOfBirthController@update']);
            Route::delete('/delete', ['as' => 'app.year.delete', 'uses' => 'YearOfBirthController@destroy']);
        });
    });


    Route::group(['prefix' => 'inhabitants'], function () {
       Route::get('/', ['as' => 'app.inhabitants.index', 'uses' => 'InhabitantsController@index']);
      Route::get('/create', ['as' => 'app.inhabitants.create', 'uses' => 'InhabitantsController@create']);
     Route::post('/create', ['uses' => 'InhabitantsController@store']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/',['as' => 'app.inhabitants.show', 'uses' => 'InhabitantsController@show']);
            Route::get('/edit', ['as' => 'app.inhabitants.edit', 'uses' => 'InhabitantsController@edit']);
            Route::post('/edit', ['uses' => 'InhabitantsController@update']);
            Route::delete('/delete', ['as' => 'app.inhabitants.delete', 'uses' => 'InhabitantsController@destroy']);
        });
    });


    Route::group(['prefix' => 'gimimo-salis'], function () {

        Route::get('/', ['as' => 'app.country.index', 'uses' => 'CountryOfBirthController@index']);
        Route::get('/create', ['as' => 'app.country.create', 'uses' => 'CountryOfBirthController@create']);
        Route::post('/create', ['uses' => 'CountryOfBirthController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.country.show', 'uses' => 'CountryOfBirthController@show']);
            Route::get('/edit', ['as' => 'app.country.edit', 'uses' => 'CountryOfBirthController@edit']);
            Route::post('/edit', ['uses' => 'CountryOfBirthController@update']);
            Route::delete('/delete', ['as' => 'app.country.delete', 'uses' => 'CountryOfBirthController@destroy']);
        });
    });

    Route::group(['prefix' => 'seimine-padetis'], function () {

        Route::get('/', ['as' => 'app.family.index', 'uses' => 'FamilyStatusController@index']);
        Route::get('/create', ['as' => 'app.family.create', 'uses' => 'FamilyStatusController@create']);
        Route::post('/create', ['uses' => 'FamilyStatusController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.family.show', 'uses' => 'FamilyStatusController@show']);
            Route::get('/edit', ['as' => 'app.family.edit', 'uses' => 'FamilyStatusController@edit']);
            Route::post('/edit', ['uses' => 'FamilyStatusController@update']);
            Route::delete('/delete', ['as' => 'app.family.delete', 'uses' => 'FamilyStatusController@destroy']);
        });
    });

    Route::group(['prefix' => 'lytis'], function () {

        Route::get('/', ['as' => 'app.gender.index', 'uses' => 'GenderController@index']);
        Route::get('/create', ['as' => 'app.gender.create', 'uses' => 'GenderController@create']);
        Route::post('/create', ['uses' => 'GenderController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.gender.show', 'uses' => 'GenderController@show']);
            Route::get('/edit', ['as' => 'app.gender.edit', 'uses' => 'GenderController@edit']);
            Route::post('/edit', ['uses' => 'GenderController@update']);
            Route::delete('/delete', ['as' => 'app.gender.delete', 'uses' => 'GenderController@destroy']);
        });
    });

    Route::group(['prefix' => 'vaiku-skaicius'], function () {

        Route::get('/', ['as' => 'app.kids.index', 'uses' => 'NumberOfKidsController@index']);
        Route::get('/create', ['as' => 'app.kids.create', 'uses' => 'NumberOfKidsController@create']);
        Route::post('/create', ['uses' => 'NumberOfKidsController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.kids.show', 'uses' => 'NumberOfKidsController@show']);
            Route::get('/edit', ['as' => 'app.kids.edit', 'uses' => 'NumberOfKidsController@edit']);
            Route::post('/edit', ['uses' => 'NumberOfKidsController@update']);
            Route::delete('/delete', ['as' => 'app.kids.delete', 'uses' => 'NumberOfKidsController@destroy']);
        });
    });

    Route::group(['prefix' => 'gatves'], function () {

        Route::get('/', ['as' => 'app.street.index', 'uses' => 'StreetController@index']);
        Route::get('/create', ['as' => 'app.street.create', 'uses' => 'StreetController@create']);
        Route::post('/create', ['uses' => 'StreetController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.street.show', 'uses' => 'StreetController@show']);
            Route::get('/edit', ['as' => 'app.street.edit', 'uses' => 'StreetController@edit']);
            Route::post('/edit', ['uses' => 'StreetController@update']);
            Route::delete('/delete', ['as' => 'app.street.delete', 'uses' => 'StreetController@destroy']);
        });
    });


    Route::group(['prefix' => 'seniunijos'], function () {

        Route::get('/', ['as' => 'app.ward.index', 'uses' => 'WardController@index']);
        Route::get('/create', ['as' => 'app.ward.create', 'uses' => 'WardController@create']);
        Route::post('/create', ['uses' => 'WardController@store']);

        Route::group(['prefix' => '{id}'], function () {
//            Route::get('/',['as' => 'app.ward.show', 'uses' => 'WardController@show']);
            Route::get('/edit', ['as' => 'app.ward.edit', 'uses' => 'WardController@edit']);
            Route::post('/edit', ['uses' => 'WardController@update']);
            Route::delete('/delete', ['as' => 'app.ward.delete', 'uses' => 'WardController@destroy']);
        });

        Route::get('/search', ['as' => 'app.search.index', 'uses' => 'InhabitantsSearchController@index']);
    });

//    Route::group(['prefix' => 'failai'], function () {
//
//        Route::get('importExport', 'MaatwebsiteController@importExport');
//        Route::get('downloadExcel/{type}', 'MaatwebsiteController@downloadExcel');
//        Route::get('importExcel', 'MaatwebsiteController@importExcel');
//        Route::post('importExcel', 'MaatwebsiteController@importExcel');
//        });


});
Route::get('importExport', 'MaatwebsiteController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteController@downloadExcel');
Route::get('importExcel', 'MaatwebsiteController@importExcel');
Route::post('importExcel', 'MaatwebsiteController@importExcel');

Route::get('/search', ['as' => 'app.search.index', 'uses' => 'InhabitantsSearchController@index']);
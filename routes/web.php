<?php
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'EventController@showMap')->name('home');
    Route::get('/events', 'EventController@showEvents')->name('event.list');
    Route::get('/events/map', 'EventController@showMap')->name('event.map');
    Route::get('/events/details/{id}', 'EventController@showDetail')->name('event.details');
    Route::post('/events/setReview', 'EventController@setReview')->name('event.setReview');
    Route::get('/users', function () {
        $users = App\User::all();
        return view('pages.users.list', ['users' => $users]);
    })->name('user.list');
    Route::get('/users/create', function () {
        return view('pages.users.create');
    })->name('user.create');
    Route::post('/users/create', 'UserController@createtUser')->name('user.set');
    Route::get('/remove/user/{id}', 'WebServiceController@removeUser')->name('user.remove');
    Route::get('/statistics', 'StatController@getStats')->name('event.stat');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
});
Route::group(['middleware' => ['api']], function () {
//
});

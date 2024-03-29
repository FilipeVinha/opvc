<?php
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/user/password/create', 'UserController@passowrdCreateUser')->name('user.password.create');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'EventController@showMap')->name('event.map');
    Route::get('/events', 'EventController@showEvents')->name('event.list');
    Route::get('/events/map', 'EventController@showMap')->name('event.map');
    Route::get('/events/details/{id}', 'EventController@showDetail')->name('event.details');
    Route::post('/events/setReview', 'EventController@setReview')->name('event.setReview');
    Route::post('/events/setPhoto/{id}', 'EventController@setPhoto')->name('event.setPhoto');
    Route::get('/statistics', 'StatController@getStats')->name('event.statistics');
    Route::get('/users', function () {
        $users = App\User::all();
        return view('pages.users.list', ['users' => $users]);
    })->name('user.list');
    Route::get('/users/create', function () {
        return view('pages.users.create');
    })->name('user.create');
    Route::post('/users/create', 'UserController@createtUser')->name('user.set');
    Route::get('/remove/user/{id}', 'WebServiceController@removeUser')->name('user.remove');
    Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
    Route::post('/user/profile', 'UserController@profileUser')->name('user.profile');
    Route::post('/user/profile/mapcenter', 'UserController@centerMapUser')->name('user.profile.centermap');

    Route::get('/user/profile/{id}', function ($id) {
        $user = \App\User::find($id);
        return view('pages.users.profile', ['user' => $user]);
    })->name('user.profile');


});

Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
});


Route::post('/api/login', 'APIController@appLogin')->name('api.login');
Route::group(['middleware' => ['api']], function () {
    Route::post('/api/categories', 'APIController@getCategories')->name('api.categories');
    Route::post('/api/subcategories', 'APIController@getSubCategories')->name('api.subCategories');
    Route::post('/api/locals', 'APIController@getLocals')->name('api.locals');
    Route::post('/api/newevent', 'APIController@newEvent')->name('api.newEvent');
});



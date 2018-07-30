<?php

// Home/play page routes

Route::get('/', function () {
    $song = Anison\Song::all();

    return view('home')->with('song', $song);
})->name('home');

Route::get('/play/{id}', 'SongController@play')->name('play');

// Songs routes

Route::get('/songs', 'SongController@index')->name('songs');

Route::get('/songs/new', function () {
    return view('addsong');
})->name('newSong');

Route::post('/songs/new', 'SongController@submit')->name('submitSong');

// Requests routes

Route::get('/requests', 'RequestController@index')->name('requests');

Route::get('/requests/new', function () {
    return view('request');
})->name('newRequest');

Route::post('/requests/new', 'RequestController@submit')->name('submitRequest');

// API routes

Route::get('api', function () {
    return Anison\Song::all();
});

Route::get('/api/{type}={id}', 'ApiController@api')->name('api');

// External routes
Route::get('/discord', function () {
    return view('discord');
})->name('discord');

Route::get('/status', function () {
    return view('status');
})->name('status');

Route::get('/paypal', function () {
    return Redirect::to('https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EV4TQ37W8QXML');
})->name('paypal');

Route::get('/github', function () {
    return Redirect::to('https://github.com/Deterio/Anison.ga');
})->name('github');

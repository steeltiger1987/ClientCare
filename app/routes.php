<?php

Route::get('/', function() {
    if(!Auth::check())
    {
        return Redirect::route('login');
    } else {
        if(Auth::user()->isAdmin()) {
            return Redirect::route('admin.dashboard');
        } else {
            return Redirect::route('client.dashboard');
        }
    }
});

Route::get('themes/{theme}', [
    'uses'   => 'ThemesController@getTheme',
    'as'     => 'themes',
    'before' => 'auth'
]);

Route::get('logout', [
    'uses'   => 'PagesController@getLogout',
    'as'     => 'logout',
    'before' => 'auth'
]);

Route::get('attachments/{hash}', [
    'uses'   => 'DownloadController@getDownload',
    'as'     => 'downloads',
    'before' => 'auth'
]);

Route::get('tickets/show/{id}', [
    'uses' => 'CommentsController@getShow',
    'as'   => 'ticket.show'
]);

Route::get('profile', [
    'uses' => 'ProfileController@getIndex',
    'as'   => 'edit.profile'
]);

Route::post('profile', [
    'uses'   => 'ProfileController@postIndex',
    'as'     => 'edit.profile',
    'before' => 'csrf|auth'
]);

Route::post('tickets/show/{id}', [
    'uses'   => 'CommentsController@postComment',
    'as'     => 'ticket.show',
    'before' => 'csrf|auth'
]);

/**
 * Guest Routing Group
 */
Route::group(['before' => 'guest'], function () {

    Route::get('/login', [
        'uses' => 'PagesController@getLogin',
        'as'   => 'login'
    ]);

    Route::post('/login', [
        'uses' => 'PagesController@postLogin',
        'as'   => 'login'
    ]);

    Route::get('/register', [
        'uses' => 'PagesController@getRegister',
        'as'   => 'register'
    ]);

    Route::post('/register', [
        'uses'   => 'PagesController@postRegister',
        'as'     => 'register',
        'before' => 'csrf'
    ]);

    Route::controller('password', 'RemindersController');

});

/**
 * Admin Routing Group
 */
Route::group(['prefix' => 'admin', 'before' => 'auth|admin'], function () {

    Route::get('/', [
        'uses' => 'Admin\DashboardController@getDashboard',
        'as'   => 'admin.dashboard'
    ]);

    Route::get('clients', [
        'uses' => 'Admin\ClientsController@getIndex',
        'as'   => 'admin.clients'
    ]);

    Route::post('clients', [
        'uses'   => 'Admin\ClientsController@postIndex',
        'as'     => 'clients',
        'before' => 'csrf'
    ]);

    Route::get('clients/{id}', [
        'uses' => 'Admin\ClientsController@getClient',
        'as'   => 'admin.client.profile'
    ]);

    Route::post('clients/{id}', [
        'uses'   => 'Admin\ClientsController@postClient',
        'as'     => 'admin.client.profile',
        'before' => 'csrf'
    ]);

    Route::get('tickets', [
        'uses' => 'Admin\TicketsController@getIndex',
        'as'   => 'admin.tickets'
    ]);

    Route::get('tickets/open', [
        'uses' => 'Admin\TicketsController@getOpen',
        'as'   => 'admin.tickets.open'
    ]);

    Route::post('tickets', [
        'uses'   => 'Admin\TicketsController@postTicket',
        'as'     => 'tickets',
        'before' => 'csrf'
    ]);

    Route::get('tickets/resolved', [
        'uses' => 'Admin\TicketsController@getResolved',
        'as'   => 'admin.tickets.resolved'
    ]);


    Route::get('tickets/show/{id}/resolve', [
        'uses' => 'Admin\TicketsController@getResolve',
        'as'   => 'ticket.resolve'
    ]);

    Route::get('tickets/show/{id}/open', [
        'uses' => 'Admin\TicketsController@getReopen',
        'as'   => 'ticket.open'
    ]);

});

/**
 * Client Routing Group
 */
Route::group(['prefix' => 'client', 'before' => 'auth'], function () {

    Route::get('/', [
        'uses' => 'Client\DashboardController@getDashboard',
        'as'   => 'client.dashboard'
    ]);

    Route::get('tickets', [
        'uses' => 'Client\TicketsController@getIndex',
        'as'   => 'client.tickets'
    ]);

    Route::post('tickets', [
        'uses'   => 'Client\TicketsController@postTicket',
        'as'     => 'client.tickets',
        'before' => 'csrf'
    ]);

    Route::get('tickets/open', [
        'uses' => 'Client\TicketsController@getOpen',
        'as'   => 'client.tickets.open'
    ]);

    Route::get('tickets/resolved', [
        'uses' => 'Client\TicketsController@getResolved',
        'as'   => 'client.tickets.resolved'
    ]);

    Route::get('tickets/show/{id}', [
        'uses' => 'CommentsController@getShow',
        'as'   => 'client.ticket.show'
    ]);
});
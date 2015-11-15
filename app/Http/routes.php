<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as'            => 'home',
    'uses'          => 'UserController@index'
]);

Route::post('/', [
    'as'            => 'post-login',
    'uses'          => 'UserController@postLogin'
]);

Route::get('/login', [
    'as'            => 'login',
    'uses'          => 'UserController@login'
]);

Route::get('/members', [
    'as'            => 'members',
    'uses'          => 'UserController@index2',
]);


Route::group(['prefix' => '/members'], function()
{
    /*
     * All User
     */

    Route::get('/password', [
        'as'            => 'password',
        'uses'          => 'UserController@password'
    ]);

    Route::post('/password', [
        'as'            => 'passwordPost',
        'uses'          => 'UserController@passwordPost'
    ]);

    Route::get('/complaint', [
        'as'            => 'complaint',
        'uses'          => 'UserController@complaint'
    ]);

    Route::post('/complaint', [
        'as'            => 'complaintPost',
        'uses'          => 'UserController@complaintPost'
    ]);

    Route::get('/profile/self', [
        'as'            => 'self-profile',
        'uses'          => 'UserController@selfProfile'
    ]);

    /*
     * Admin Routes
     */

    Route::group(['prefix' => '/admin'], function()
    {
        Route::get('todolist', [
            'as'    => 'members.admin.todolist',
            'uses'  => 'UserController@todolist'
        ]);

        Route::resource('/profile', 'Admin\ProfileController', ['only' => ['index', 'store', 'edit', 'update', 'destroy', 'users']]);

        Route::get('/profiles/activate', [
            'as'            => 'profileActivate',
            'uses'          => 'Admin\ProfileController@activate'
        ]);

        Route::get('/profile/users', [
            'as'            => 'members.admin.profile.getUsers',
            'uses'          => 'Admin\ProfileController@getUsers'
        ]);

        Route::get('complaint/{id}', [
            'as'            => 'complaint.edit',
            'uses'          => 'UserController@complaintEdit'
        ]);

        Route::post('complaint/{id}', [
            'as'            => 'complaint.update',
            'uses'          => 'UserController@complaintUpdate'
        ]);

        Route::get('laporan/harian', [
            'as'            => 'members.admin.laporan.harian',
            'uses'          => 'Admin\LaporanController@harian'
        ]);

        Route::post('laporan/carian', [
            'as'            => 'members.admin.laporan.harian.carian',
            'uses'          => 'Admin\LaporanController@carian'
        ]);

        Route::get('carian', [
            'as'            => 'members.admin.carian',
            'uses'          => 'Admin\CarianController@carian'
        ]);

        Route::post('carian/hasilCarian', [
            'as'            => 'members.admin.hasilCarian',
            'uses'          => 'Admin\CarianController@hasilCarian'
        ]);

        Route::get('/angular', [
            'as'            => 'members.admin.angular',
            'uses'          => 'Admin\AngularController@index'
        ]);

        Route::get('/angular/{user}', [
            'as'            => 'members.admin.angular.users',
            'uses'          => 'Admin\AngularController@users'
        ]);

    });

    /*
     * Supervisor Routes
     */

    Route::group(['prefix' => '/supervisor'], function()
    {
        Route::get('/', [
            'as'            => 'members.supervisor.laporan.index',
            'uses'          => 'Supervisor\LaporanController@index'
        ]);

        Route::get('pelbagai', [
            'as'            => 'members.supervisor.pelbagai',
            'uses'          => 'Supervisor\PelbagaiController@index'
        ]);


        Route::group(['prefix' => '/laporan'], function()
        {
            // assigning laporan to a technician
            Route::post('{id}/update', [
                'as'            => 'members.supervisor.laporan.update',
                'uses'          => 'Supervisor\LaporanController@update'
            ]);

            Route::post('harian', [
                'as'            => 'members.supervisor.laporan.harian',
                'uses'          => 'Supervisor\PelbagaiController@harian'
                ]
            );

            Route::post('bulanan', [
                'as'            => 'members.supervisor.laporan.bulanan',
                'uses'          => 'Supervisor\PelbagaiController@bulanan'
            ]);

            Route::post('bulananPenempatan', [
                'as'            => 'members.supervisor.laporan.bulananPenempatan',
                'uses'          => 'Supervisor\PelbagaiController@bulananPenempatan'
            ]);

            Route::post('bulananPpk', [
                'as'            => 'members.supervisor.laporan.bulananPpk',
                'uses'          => 'Supervisor\PelbagaiController@bulananPpk'
            ]);



            Route::post('tahunanPpk', [
                'as'            => 'members.supervisor.laporan.tahunanPpk',
                'uses'          => 'Supervisor\PelbagaiController@tahunanPpk'
            ]);

            Route::post('tahunanXPpk', [
                'as'            => 'members.supervisor.laporan.tahunanXPpk',
                'uses'          => 'Supervisor\PelbagaiController@tahunanXPpk'
            ]);

            Route::post('ringkasanPeratusan', [
                'as'            => 'members.supervisor.laporan.ringkasanPeratusan',
                'uses'          => 'Supervisor\PelbagaiController@ringkasanPeratusan'
            ]);

            Route::get('terkini', [
                'as'            => 'members.supervisor.laporan.terkini',
                'uses'          => 'Supervisor\LaporanController@terkini'
            ]);

            Route::get('detailsTerkini/{username}/{status}', [
                'as'            => 'members.supervisor.laporan.detailsTerkini',
                'uses'          => 'Supervisor\LaporanController@detailsTerkini'
            ]);

            Route::get('kemaskini', [
                'as'            => 'members.supervisor.laporan.kemaskini',
                'uses'          => 'Supervisor\LaporanController@kemaskini'
            ]);

            // give a selesai status to a laporan
            Route::post('updates/{id}', [
                'as'            => 'members.supervisor.laporan.update2',
                'uses'          => 'Supervisor\LaporanController@update2'
            ]);


        });

    });

    /*
     * Technician Routes
     */

    Route::group(['prefix' => '/technician'], function()
    {
        Route::get('/', [
            'as'            => 'members.technician.index',
            'uses'          => 'Technician\LaporanController@index'
        ]);

        Route::get('/cetak', [
            'as'            => 'members.technician.index.cetak',
            'uses'          => 'Technician\CetakController@index'
        ]);

        Route::get('laporan/{id}/edit', [
            'as'            => 'members.technician.edit',
            'uses'          => 'Technician\LaporanController@edit'
        ]);

        Route::post('laporan/{id}/update', [
            'as'            => 'members.technician.update',
            'uses'          => 'Technician\LaporanController@update'
        ]);

        Route::get('laporan/harian', [
            'as'            => 'members.technician.laporan.harian',
            'uses'          => 'Technician\LaporanController@harian'
        ]);

        Route::post('laporan/harian', [
            'as'            => 'members.technician.laporan.harian.carian',
            'uses'          => 'Technician\LaporanController@carian'
        ]);

        Route::get('laporan/terkini', [
            'as'            => 'members.technician.laporan.terkini',
            'uses'          => 'Technician\LaporanController@terkini'
        ]);


    });

    /*
     * User Routes
     */

    Route::group(['prefix' => '/user'], function() {

        Route::resource('/laporan', 'User\LaporanController', ['only' => ['index', 'edit', 'store', 'update', 'destroy']]);

    });

}); // end of members groups

Route::get('/logout', [
    'as'            => 'logout',
    'uses'          => 'UserController@logout'
]);

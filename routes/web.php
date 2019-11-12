<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/diagnosa/{keyword}/{start}/{limit}', 'DiagnosisController@index');
$router->post('/post-diagnosis', 'DiagnosisController@postDiagnosis');
$router->get('/dokter/{start}/{limit}', 'DoctorController@index');
$router->get('/kesadaran', 'AwarenessController@index');

$router->group(['prefix' => 'kunjungan'], function () use ($router) {
    $router->get('/rujukan/{noVisits}', 'VisitsController@index');
    $router->get('/peserta/{noCard}', 'VisitsController@history');
    $router->post('/', 'VisitsController@addVisitor');
    $router->put('/', 'VisitsController@updateVisitor');
    $router->delete('/{noVisits}', 'VisitsController@deleteVisitor');
});

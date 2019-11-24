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
$router->put('/wd/pendaftaran/{bpjs_no}/{date}', 'WdController@putpendaftaran');
$router->get('/wd/pendaftaran/{bpjs_no}', 'WdController@getpendaftaran');
$router->put('/wd/puttest', 'WdController@puttest');
$router->get('/wd/gettest', 'WdController@gettest');
$router->post('/post-diagnosis', 'DiagnosisController@postDiagnosis');
$router->get('/dokter/{start}/{limit}', 'DoctorController@index');
$router->get('/kesadaran', 'AwarenessController@index');
$router->get('/provider/{start}/{limit}', 'ProviderController@index');
$router->get('/poli/fktp/{start}/{limit}', 'PoliController@index');
$router->get('/statuspulang/rawatInap/{status}', 'InpatientController@index');

$router->group(['prefix' => 'kunjungan'], function () use ($router) {
    $router->get('/rujukan/{noVisits}', 'VisitsController@index');
    $router->get('/peserta/{noCard}', 'VisitsController@history');
    $router->post('/', 'VisitsController@addVisitor');
    $router->put('/', 'VisitsController@updateVisitor');
    $router->delete('/{noVisits}', 'VisitsController@deleteVisitor');
});

$router->group(['prefix' => 'mcu'], function () use ($router) {
    $router->post('/', 'McuController@postMcu');
    $router->put('/', 'McuController@updateMcu');
    $router->get('/kunjungan/{noKunjungan}', 'McuController@getMcu');
    $router->delete('/{kdMcu}/kunjungan/{noKunjungan}', 'McuController@deleteMcu');
});

$router->group(['prefix' => 'peserta'], function () use ($router) {
    $router->post('/', 'ParticipantController@index');
    $router->get('/{jenis}/{noParticipant}', 'ParticipantController@index');
});

$router->group(['prefix' => 'pendaftaran'], function () use ($router) {
    $router->get('/noUrut/{no}/tglDaftar/{tgl}', 'RegistrationController@getByNoUrut');
    $router->get('/tglDaftar/{tgl}/{start}/{limit}', 'RegistrationController@getByProvider');
    $router->post('/', 'RegistrationController@addRegistration');
    $router->delete('/peserta/{noKartu}/tglDaftar/{tglDaftar}/noUrut/{noUrut}/kdPoli/{kdPoli}', 'RegistrationController@deleteRegistration');
});

$router->group(['prefix' => 'obat'], function () use ($router) {
    $router->get('/dpho/{keyword}/{start}/{limit}', 'MedicamentController@getDPHO');
    $router->get('/kunjungan/{noKunjungan}', 'MedicamentController@getMedicamentVisit');
    $router->post('/kunjungan', 'MedicamentController@addMedicament');
    $router->delete('/{kdObatSK}/kunjungan/{noKunjungan}', 'MedicamentController@deleteMedicament');
});

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\RegistrationService;

class RegistrationController extends Controller
{
    protected $service;

    public function __construct(RegistrationService $service)
    {
        $this->service = $service;
    }

    public function getByNoUrut(Request $request, $noUrut, $tglDaftar)
    {
        return $this->service->getRegistration($request, $noUrut, $tglDaftar);
    }

    public function getByProvider(Request $request, $tgl, $start, $limit)
    {
        return $this->service->getByProvider($request, $tgl, $start, $limit);
    }

    public function addRegistration(Request $request)
    {
        return $this->service->addRegistration($request);
    }

    public function deleteRegistration(Request $request, $noKartu, $tglDaftar, $noUrut, $kdPoli)
    {
        return $this->service->deleteRegistration($request, $noKartu, $tglDaftar, $noUrut, $kdPoli);
    }
}

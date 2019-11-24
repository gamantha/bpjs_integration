<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\WdService;

class WdController extends Controller
{
    protected $service;

    public function __construct(WdService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $keyword, $start, $limit)
    {
        return $this->service->getDiagnosis($request, $keyword, $start, $limit);
    }


    public function puttest()
    {
        echo 'put test';
    }

    public function gettest()
    {
        echo 'GET test';
        return $this->service->getPendaftaran();
    }



    public function getpendaftaran (Request $request, $bpjs_no)
    {
        return $this->service->getPendaftaran($request, $bpjs_no);
    }

    public function putpendaftaran (Request $request, $bpjs_no, $id)
    {
        return $this->service->putPendaftaran($request, $bpjs_no, $id);
    }
}

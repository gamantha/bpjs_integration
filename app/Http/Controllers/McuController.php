<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\McuService;

class McuController extends Controller
{
    protected $service;

    public function __construct(McuService $service)
    {
        $this->service = $service;
    }

    public function postMcu(Request $request)
    {
        return $this->service->postMcu($request);
    }

    public function updateMcu(Request $request)
    {
        return $this->service->updateMcu($request);
    }

    public function getMcu(Request $request, $noKunjungan)
    {
        return $this->service->getMcu($request, $noKunjungan);
    }

    public function deleteMcu(Request $request, $kdMcu, $noKunjungan)
    {
        return $this->service->deleteMcu($request, $kdMcu, $noKunjungan);
    }
}

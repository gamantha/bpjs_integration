<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\MedicamentService;

class MedicamentController extends Controller
{
    protected $service;

    public function __construct(MedicamentService $service)
    {
        $this->service = $service;
    }

    public function getDPHO(Request $request, $keyword, $start, $limit)
    {
        return $this->service->getDPHO($request, $keyword, $start, $limit);
    }

    public function getMedicamentVisit(Request $request, $noKunjungan)
    {
        return $this->service->getMedicamentVisit($request, $noKunjungan);
    }

    public function addMedicament(Request $request)
    {
        return $this->service->addMedicament($request);
    }

    public function deleteMedicament(Request $request, $kdObatSK, $noKunjungan)
    {
        return $this->service->deleteMedicament($request, $kdObatSK, $noKunjungan);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\VisitsService;

class VisitsController extends Controller
{
    protected $service;

    public function __construct(VisitsService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $noVisits)
    {
        return $this->service->getVisits($request, $noVisits);
    }

    public function history(Request $request, $noCard)
    {
        return $this->service->getHistory($request, $noCard);
    }

    public function addVisitor(Request $request)
    {
        return $this->service->addVisitor($request);
    }

    public function updateVisitor(Request $request)
    {
        return $this->service->updateVisitor($request);
    }

    public function deleteVisitor(Request $request, $noVisits)
    {
        return $this->service->deleteVisitor($request, $noVisits);
    }
}

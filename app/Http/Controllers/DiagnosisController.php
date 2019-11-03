<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\DiagnosisService;

class DiagnosisController extends Controller
{
    protected $service;
    public function __construct(DiagnosisService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request, $keyword, $start, $limit)
    {
        return $this->service->getDiagnosis($request, $keyword, $start, $limit);
    }
}

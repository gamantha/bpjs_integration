<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\WdService;

class DiagnosisController extends Controller
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

    public function postDiagnosis(Request $request)
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 300);

        $path = $request->file('csv_file')->getRealPath();
        $datas = array_map('str_getcsv', file($path));

        return $this->service->postDiagnosis($datas);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\DiagnosaService;

class DiagnosaController extends Controller
{
    protected $service;
    public function __construct(DiagnosaService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request, $keyword, $start, $limit)
    {
        return $this->service->getDiagnosa($request, $keyword, $start, $limit);
    }
}

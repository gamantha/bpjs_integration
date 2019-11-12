<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\InpatientService;

class InpatientController extends Controller
{
    protected $service;

    public function __construct(InpatientService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $status)
    {
        return $this->service->getInpatient($request, $status);
    }
}

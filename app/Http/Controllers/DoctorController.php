<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\DoctorService;

class DoctorController extends Controller
{
    protected $service;

    public function __construct(DoctorService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $start, $limit)
    {
        return $this->service->getDoctor($request, $start, $limit);
    }
}

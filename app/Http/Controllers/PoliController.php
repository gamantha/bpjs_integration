<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\PoliService;

class PoliController extends Controller
{
    protected $service;

    public function __construct(PoliService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $start, $limit)
    {
        return $this->service->getPoli($request, $start, $limit);
    }
}

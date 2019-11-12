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
}

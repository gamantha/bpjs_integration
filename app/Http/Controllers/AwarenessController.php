<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\AwarenessService;

class AwarenessController extends Controller
{
    protected $service;

    public function __construct(AwarenessService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->getAwareness($request);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\ProviderService;

class ProviderController extends Controller
{
    protected $service;

    public function __construct(ProviderService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $start, $limit)
    {
        return $this->service->getProvider($request, $start, $limit);
    }
}

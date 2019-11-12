<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BPJS\ParticipantService;

class ParticipantController extends Controller
{
    protected $service;
    public function __construct(ParticipantService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request, $noParticipant)
    {
        return $this->service->getParticipant($request, $noParticipant);
    }

    public function getParticipantByJenis(Request $request, $jenis, $noParticipant)
    {
        return $this->service->getParticipantByJenis($request, $jenis, $noParticipant);
    }
}

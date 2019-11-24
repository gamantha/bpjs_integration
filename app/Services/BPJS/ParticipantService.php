<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class ParticipantService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function getParticipant($request)
    {
        try {
            $payload = $request->input('payloadData');
            $credential = $request->input('pcareCreds');
            $noParticipant = $payload['bpjs'];
            $data  = $this->get('peserta/' . $noParticipant, [], [], $credential);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function getparticipantByJenis($request, $jenis, $noParticipant)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('peserta/' . $jenis . '/' . $noParticipant, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }
}

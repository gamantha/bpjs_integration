<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class AwarenessService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function getAwareness($request)
    {
        $header = $request->headers->all();
        $data  = $this->get('kesadaran', [], [], $header);
        return $data;
    }
}

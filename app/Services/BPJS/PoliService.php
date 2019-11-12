<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class PoliService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function getPoli($request, $start, $limit)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('poli/fktp/' . $start . '/' . $limit, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }
}

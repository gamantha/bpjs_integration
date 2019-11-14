<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class McuService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function postMcu($request)
    {
        try {
            $header = $request->headers->all();
            $params = $request->input();
            $data  = $this->post('mcu', $header, $params);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function updateMcu($request)
    {
        try {
            $header = $request->headers->all();
            $params = $request->input();
            $data  = $this->put('mcu', $header, $params);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function getMcu($request, $no)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('mcu/kunjungan/' . $no, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }

    public function deleteMcu($request, $kdMcu, $noKunjungan)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->delete('mcu/' . $kdMcu . '/kunjungan/' . $noKunjungan, $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }
}

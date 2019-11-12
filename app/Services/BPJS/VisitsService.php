<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class VisitsService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function getVisits($request, $noVisits)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('kunjungan/rujukan/' . $noVisits, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }

    public function getHistory($request, $noCard)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('kunjungan/peserta/' . $noCard, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }

    public function addVisitor($request)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->post('kunjungan', $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function updateVisitor($request)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->put('kunjungan', $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function deleteVisitor($request, $noVisits)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->delete('kunjungan/' . $noVisits, $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }
}

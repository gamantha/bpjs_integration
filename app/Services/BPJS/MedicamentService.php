<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class MedicamentService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function getDPHO($request, $keyword, $start, $limit)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('obat/dpho/' . $keyword . '/' . $start . '/' . $limit, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }

    public function getMedicamentVisit($request, $noKunjungan)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('obat/kunjungan/' . $noKunjungan, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), 500);
        }
    }

    public function addMedicament($request)
    {
        try {
            $header = $request->headers->all();
            $params = $request->input();
            $data  = $this->post('obat/kunjungan', $header, $params);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function deleteMedicament($request, $kdObatSK, $noKunjungan)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->delete('obat/' . $kdObatSK . '/kunjungan/' . $noKunjungan, $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }
}

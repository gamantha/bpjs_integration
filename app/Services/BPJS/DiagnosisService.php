<?php

namespace App\Services\BPJS;


use Illuminate\Http\Request;
use App\Services\ResponseService;
use App\Services\AbstractService;

class DiagnosisService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function getDiagnosis($request, $keyword, $start, $limit)
    {
        $header = $request->headers->all();
        $data  = $this->get('diagnosa/' . $keyword . '/' . $start . '/' . $limit, [], [], $header);
        return $data;
    }
}

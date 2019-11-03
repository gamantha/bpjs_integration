<?php

namespace App\Services\BPJS;


use Illuminate\Http\Request;
use App\Services\ResponseService;
use App\Services\AbstractService;

class DoctorService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }
    public function getDoctor($request, $start, $limit)
    {
        $header = $request->headers->all();
        $data  = $this->get('dokter/' . $start . '/' . $limit, [], [], $header);
        return $data;
    }
}

<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;

class RegistrationService extends AbstractService
{
    protected $response;

    public function __construct(ResponseService $response)
    {
        $this->response = $response;
    }

    public function getRegistration($request, $noUrut, $tglDaftar)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('/pendaftaran/noUrut/' . $noUrut . '/tglDaftar/' . $tglDaftar, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function getByProvider($request, $tglDaftar, $start, $limit)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->get('pendaftaran/tglDaftar/' . $tglDaftar . '/' . $start . '/' . $limit, [], [], $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function addRegistration($request)
    {
        try {
            $body = $request->input('payloadData');
            $credential = $request->input('pcareCreds');

            $payload = [
                "kdProviderPeserta" => $body['providerCode'],
                "tglDaftar" => $body['registrationDate'],
                "noKartu" => $body['bpjsNo'],
                "kdPoli" => $body['departmentCode'],
                "keluhan" => $body['complaints'],
                "kunjSakit" => $body['sickVisit'],
                "sistole" => $body['sickVisit'],
                "diastole" => $body['diastole'],
                "beratBadan" => $body['bodyWeight'],
                "tinggiBadan" => $body['bodyHeight'],
                "respRate" => $body['respRate'],
                "heartRate" => $body['heartRate'],
                "rujukBalik" => $body['referBack'],
                "kdTkp" => $body['tkpCode'],
            ];

            $data  = $this->post('pendaftaran', $credential, $payload);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }

    public function deleteRegistration($request, $noKartu, $tglDaftar, $noUrut, $kdPoli)
    {
        try {
            $header = $request->headers->all();
            $data  = $this->delete('pendaftaran/peserta/' . $noKartu . '/tglDaftar/' . $tglDaftar . '/noUrut/' . $noUrut . '/kdPoli/' . $kdPoli, $header);
            return $data;
        } catch (\Exception $e) {
            return $this->response->setMessage($e->getMessage(), $e->getCode());
        }
    }
}

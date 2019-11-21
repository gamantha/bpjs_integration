<?php

namespace App\Services\BPJS;

use App\Services\ResponseService;
use App\Services\AbstractService;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class WdService extends AbstractService
{
    protected $response;
    protected $model;

    public function __construct(ResponseService $response, Pendaftaran $model)
    {
        $this->response = $response;
        $this->model = $model;
    }

    public function getPendaftaran()
    {
        $search = $this->model::all();
        //where('cat_code', 'LIKE', "%{$keyword}%")
            //->orWhere('code', 'LIKE', '%' . $keyword . '%')
            //->orWhere('name', 'LIKE', "%{$keyword}%")
            //->orWhere('cat_name', 'LIKE', "%{$keyword}%")
            // ->get()->toArray();

        $data = [];
        if (count($search) > 0) {
           // $data[] = array_slice($search, $start, $limit);
           $data = $search;
        }

        return $this->response->setResponse($data, count($search), 'Sukses get data');
    }

    public function putPendaftaran($request, $bpjs, $id)
    {
        //$id = '11';
        $search = Pendaftaran::
        where('id', '=', $id)
            //->andWhere('code', 'LIKE', '%' . $keyword . '%')
            //->orWhere('name', 'LIKE', "%{$keyword}%")
            //->orWhere('cat_name', 'LIKE', "%{$keyword}%")
             ->get();

        $data = [];
        if (count($search) > 0) {
           // $data[] = array_slice($search, $start, $limit);
           $data = $search;
        }
    

        $search[0]->nama = $request->name;
        //$model1->kelamin = $request->kelamin;
        $search[0]->save();
//echo '<pre>';

     //print_r($request->all());
        //print_r($model1);
        return $this->response->setResponse($data, count($search), 'Sukses PUT data');
    }



    public function getDiagnosis($request, $keyword, $start, $limit)
    {
        $search = $this->model::where('cat_code', 'LIKE', "%{$keyword}%")
            ->orWhere('code', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', "%{$keyword}%")
            ->orWhere('cat_name', 'LIKE', "%{$keyword}%")->get()->toArray();

        $data = [];
        if (count($search) > 0) {
            $data[] = array_slice($search, $start, $limit);
        }

        return $this->response->setResponse($data, count($search), 'Sukses get data');
    }


}

<?php

namespace App\Services\BPJS;


use Illuminate\Http\Request;
use App\Services\ResponseService;
use App\Services\AbstractService;
use App\Models\Diagnosis;
use Carbon\Carbon;

class DiagnosisService extends AbstractService
{
    protected $response;
    protected $model;

    public function __construct(ResponseService $response, Diagnosis $model)
    {
        $this->response = $response;
        $this->model = $model;
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

    public function postDiagnosis($datas)
    {
        try {
            $diagnosisData = $this->model::count();

            if (count($datas) > 0 && $diagnosisData === 0) {
                $diagnosis = [];
                foreach ($datas as $data) {
                    $field = [];
                    $field['cat_code'] = $data[0];
                    $field['code'] = $data[2];
                    $field['name'] = $data[3];
                    $field['cat_name'] = $data[5];
                    $field['created_at'] = Carbon::now();
                    $field['updated_at'] = Carbon::now();
                    $diagnosis[] = $field;
                }

                $diagnosis = collect($diagnosis); // Make a collection to use the chunk method

                // it will chunk the dataset in smaller collections containing 500 values each.
                // Play with the value to get best result
                $chunks = $diagnosis->chunk(500);
                foreach ($chunks as $chunk) {
                    $this->model::insert($chunk->toArray());
                }

                $diagnosisData = $this->model::count();

                return $this->response->setMessage('Success insert data ' . count($datas), 200);
            }

            return $this->response->setMessage('Data Exist', 200);
        } catch (\Exception $e) {
            $this->response->setMessage('Error insert data', 500);
        }
    }
}

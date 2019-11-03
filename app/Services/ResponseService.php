<?php
namespace App\Services;

class ResponseService
{
    public function setMessage($message, $code = 200, $data = null)
    {
        $response = [
            'response' => $data,
            'metaData' => [
                'message' => $message,
                'code' => $code
            ]
        ];

        return response()->json($response, $code);
    }
    public function setResponse($data, $count, $message, $code = 200)
    {
        $response = [
            'response' => [
                "count" => $count,
                "list" => $data
            ],
            'metaData' => [
                'message' => $message,
                'code' => $code,
            ]
        ];
        return response()->json($response, $code);
    }
}

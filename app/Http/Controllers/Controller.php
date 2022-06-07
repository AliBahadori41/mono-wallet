<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Response for the Api request
     *
     * @param mixed $passedData
     * @param bool $success
     * @param int $statusCode
     * @param array $header
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function responsed($passedData = [], bool $success = true, int $statusCode = 200, array $header = [])
    {
        $data = [
            'success' => $success,
        ];

        if (count($passedData) > 0) {
            $data['data'] = $passedData;
        }

        return response()->json($data, $statusCode, $header);
    }
}

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
     * @param mixed $data
     * @param int $statusCode
     * @param array $header
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function responsed($data, $statusCode = 200, array $header = [])
    {
        return response()->json($data, $statusCode, $header);
    }
}

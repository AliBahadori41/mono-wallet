<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Backoffice\PromotionStoreRequest;
use App\Http\Resources\Api\PromotionResource;
use App\Models\PromotionCode;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $promotions = PromotionCode::all();

        return $this->responsed(PromotionResource::collection($promotions->load('users')), true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PromotionStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PromotionStoreRequest $request)
    {
        $promotion = PromotionCode::create($request->all());

        return $this->responsed(new PromotionResource($promotion), true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PromotionCode $promotion_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(PromotionCode $promotion_code)
    {
        return $this->responsed(new PromotionResource($promotion_code->load('users')), true);
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\PromotionStoreRequest;
use App\Http\Resources\Api\PromotionResource;
use App\Models\PromotionCode;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = PromotionCode::all();

        return $this->responsed([
            'success' => true,
            'data' => PromotionResource::collection($promotions->load('users')),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PromotionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionStoreRequest $request)
    {
        $promotion = PromotionCode::create($request->all());

        return $this->responsed([
            'success' => true,
            'data' => new PromotionResource($promotion),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PromotionCode $promotion_code
     * @return \Illuminate\Http\Response
     */
    public function show(PromotionCode $promotion_code)
    {
        return $this->responsed([
            'success' => true,
            'data' => new PromotionResource($promotion_code->load('users')),
        ]);
    }
}

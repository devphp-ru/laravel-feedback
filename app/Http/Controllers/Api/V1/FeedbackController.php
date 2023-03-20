<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Resources\FeedbackResource;
use App\Services\Contracts\Service;
use App\Services\Feedbacks\FeedbackService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
	/** @var Service  */
	private Service $service;

	/**
	 * FeedbackController constructor.
	 *
	 * @param FeedbackService $service
	 */
	public function __construct(FeedbackService $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreFeedbackRequest $request
	 * @return JsonResponse
	 */
	public function store(StoreFeedbackRequest $request): JsonResponse
	{
		$item = $this->service->create($request);

		if (!$item) {
			return response()->json([
				'status' => false,
			])->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
		}

		return response()->json([
			'status' => true,
			'item' => new FeedbackResource($item),
		])->setStatusCode(Response::HTTP_OK);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}

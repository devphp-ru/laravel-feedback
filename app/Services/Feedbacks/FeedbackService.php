<?php

namespace App\Services\Feedbacks;

use App\Factory\FeedbackFactory;
use App\Models\Feedback;
use App\Services\Contracts\Service;
use App\Services\Requests\ApiRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FeedbackService implements Service
{
	/** @var Feedback  */
	private Feedback $model;

	/** @var FeedbackFactory  */
	private FeedbackFactory $factory;

	/**
	 * FeedbackService constructor.
	 *
	 * @param FeedbackFactory $factory
	 */
	public function __construct(FeedbackFactory $factory)
	{
		$this->model = app(Feedback::class);
		$this->factory = $factory;
	}

	/**
	 * Сохранить модель в хранилище
	 *
	 * @param ApiRequest $request
	 * @return Feedback
	 * @throws \Exception
	 */
	public function create(ApiRequest $request): Feedback
	{
		$item = $this->factory->create('mysql')->create($request->only($this->model->getFillable()));
		//$item = $this->factory->create('mysql_two')->create($request->only($this->model->getFillable()));

		$this->storeFile('feedbacks.txt', $item);

		return $item;
	}

	/**
	 * Сохранить модель в файл
	 * storage/app/feedbacks.txt
	 *
	 * @param string $filename
	 * @param Model $item
	 * @return bool
	 */
	private function storeFile(string $filename, Model $item): bool
	{
		return Storage::append($filename, $item);
	}
}

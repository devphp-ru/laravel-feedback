<?php

namespace App\Factory;

use App\Models\Feedback;

class FeedbackFactory
{
	/**
	 *
	 * @param string $type
	 * @return Feedback
	 * @throws \Exception
	 */
	public function create(string $type)
	{
		return match ($type) {
			'mysql' => (new Feedback())->setConnection('mysql'),
			'mysql_two' => (new Feedback())->setConnection('mysql_two'),
			default => throw new \Exception('Не верный тип объекта'),
		};
	}
}

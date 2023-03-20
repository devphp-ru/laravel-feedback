<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class FeedbackController extends Controller
{
	/**
	 * Показать страницу шаблона
	 *
	 * @return View
	 */
    public function index(): View
	{
		return view('index');
	}
}

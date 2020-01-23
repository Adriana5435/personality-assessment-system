<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use Illuminate\Contracts\View\View;

class FrontController extends Controller
{
    /**
     * Display the homepage of the front-end.
     *
     * @return View
     */
    public function index(): View
    {
        // Retrieve all questionnaires with their associated data.
        $questionnaires = Questionnaire::withAll()->get();

        // Pass the retrieved data to the welcome view.
        return view('welcome', compact('questionnaires'));
    }
}

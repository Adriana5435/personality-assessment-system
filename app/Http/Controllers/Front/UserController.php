<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Display the dashboard for the authenticated user.
     *
     * @return View
     */
    public function dashboard(): View
    {
        // Retrieve the currently authenticated user.
        $user = auth()->user();

        // Retrieve the paid and latest submits for the user.
        $submits = $user->submits()->paid()->latest()->get();

        // Retrieve all questionnaires.
        $questionnaires = Questionnaire::all();

        // Pass the retrieved data to the user dashboard view.
        return view('front.user.dashboard', compact('submits', 'questionnaires'));
    }
}

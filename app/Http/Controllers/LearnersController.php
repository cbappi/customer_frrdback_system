<?php

namespace App\Http\Controllers;
use App\Models\Learner;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LearnersController extends Controller
{

    function LearnerPage():View{

        return view('pages.dashboard.learner-page');
    }

    function LearnerList()
    {
        // $learners =  Learner::get();
        // return $learners;

        return Learner::get();

    }
}

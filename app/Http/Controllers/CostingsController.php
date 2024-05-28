<?php

namespace App\Http\Controllers;
use App\Models\Costing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CostingsController extends Controller
{
    function CostPage():View{
        return view('pages.dashboard.cost-page');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    function ElementPage():View{

        return view('pages.dashboard.element-page');
    }

    function ElementList()
    {

        return Element::get();

    }

    function ElementCreate(Request $request){
        $user_id=$request->header('id');
        return Element::create([
            'accessories'=>$request->input('accessories'),
            'amount'=>$request->input('amount'),
            'user_id'=>$user_id
        ]);
    }
}

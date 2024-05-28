<?php

namespace App\Http\Controllers;

use App\Models\FrontCategory;
use Illuminate\Http\Request;


class FrontCategoryController extends Controller
{
    function FrontCategoryPage(){
        return view('pages.dashboard-admin.front-category-page');
    }

    function FrontCategoryList(Request $request){
        //$user_id=$request->header('id');
       // return FrontCategory::where('user_id',$user_id)->get();
           //$user_id=$request->header('id');
           return FrontCategory::get();
    }
}

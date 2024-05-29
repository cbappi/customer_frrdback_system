<?php

namespace App\Http\Controllers;

use App\Models\FrontCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Illuminate\View\View;


class FrontCategoryController extends Controller
{
    function FrontCategoryPage(){
        return view('pages.dashboard-admin.front-category-page');
    }

    function FrontCategoryList(Request $request){
        //$user_id=$request->header('id');
        //return FrontCategory::where('user_id',$user_id)->get();
           $user_id=$request->header('id');
           return FrontCategory::get();
    }

    function FrontCategoryCreate(Request $request){
        $user_id=$request->header('id');
        return FrontCategory::create([
            'cat'=>$request->input('cat'),
            'image'=>$request->input('image'),
            'user_id'=>$user_id,

        ]);
    }

    function FrontcategoryData(Request $request){
        return DB::table('front_categories')->get();
    }


    function heroData(Request $request){
        return DB::table('heroproperties')->first();
     }
}

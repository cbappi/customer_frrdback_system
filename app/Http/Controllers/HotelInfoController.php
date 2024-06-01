<?php

namespace App\Http\Controllers;
use App\Models\HotelInfo;

use App\Models\FrontCategory;
use App\Models\User;
use App\Models\HotelSubcategory;

use Illuminate\Http\Request;

class HotelInfoController extends Controller
{
    function HotelInfoPage(){
        return view('pages.dashboard-admin.hotel-info-page');
    }

    // function HotelInfoList(Request $request){
    //     $user_id=$request->header('id');
    //     $hotelInfos = HotelInfo::with(['user', 'hotelSubcategory'])->get();
    //    //return response()->json($hotelInfos);
    //     return $hotelInfos;
    // }

    function FrontCategoryList(Request $request){
        //$user_id=$request->header('id');
        //return FrontCategory::where('user_id',$user_id)->get();
           $user_id=$request->header('id');
           return FrontCategory::get();
    }






    }



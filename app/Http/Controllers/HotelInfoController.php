<?php

namespace App\Http\Controllers;
use App\Models\HotelInfo;
use Illuminate\Http\Request;

class HotelInfoController extends Controller
{
    function HotelInfoPage(){
        return view('pages.dashboard-admin.hotel-info-page');
    }

    function HotelInfoList(Request $request){

           return HotelInfo::get();
    }

}

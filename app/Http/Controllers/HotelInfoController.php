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
        return view('pages.dashboard-user.hotel-info-page');
    }

    // function HotelInfoList(Request $request){
    //     $user_id=$request->header('id');
    //     $hotelInfos = HotelInfo::with(['user', 'hotelSubcategory'])->get();
    //    //return response()->json($hotelInfos);
    //     return $hotelInfos;
    // }

    function HotelInfoList(Request $request)
    {

        return HotelInfo::with('subcategory','user')->get();

    }

    public function HotelSubCategory()
    {
        return HotelSubcategory::all();
    }

    function FrontCategoryList(Request $request){
        //$user_id=$request->header('id');
        //return FrontCategory::where('user_id',$user_id)->get();
           $user_id=$request->header('id');
           return FrontCategory::get();
    }

    function HotelInfoCreate(Request $request){
        $user_id=$request->header('id');
        return HotelInfo::create([
            'hotel_name'=>$request->input('hotel_name'),
            'hotel_description'=>$request->input('hotel_description'),
            'hotel_amenities'=>$request->input('hotel_amenities'),
            'hotel_type'=>$request->input('hotel_type'),
            'room_feature'=>$request->input('room_feature'),
            'room_type'=>$request->input('room_type'),
            'start_room_price'=>$request->input('start_room_price'),
            'last_room_price'=>$request->input('last_room_price'),

            'discount'=>$request->input('discount'),
            'country'=>$request->input('country'),
            'district'=>$request->input('district'),

            'address'=>$request->input('address'),
            'website'=>$request->input('website'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),


            'hotel_subcategory_id'=>$request->input('hotel_subcategory_id'),
            'user_id' => $user_id
        ]);
    }





    }



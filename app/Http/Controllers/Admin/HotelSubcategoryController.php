<?php

namespace App\Http\Controllers\Admin;
use App\Models\HotelSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelSubcategoryController extends Controller
{
    function HotelSubCategoryAdminPage(){
        return view('pages.dashboard-admin.hotel-sub-category-page');
    }

    function HotelSubCategoryAdminList(Request $request){

           return HotelSubCategory::get();
    }


    function HotelSubCategoryAdminCreate(Request $request){

        return HotelSubCategory::create([
            'sub_cat_name'=>$request->input('sub_cat_name'),

        ]);
    }

    function HotelSubCategoryAdminDelete(Request $request){
        $hotel_subcategory_id=$request->input('id');
        return HotelSubCategory::where('id',$hotel_subcategory_id)->delete();
    }

    function HotelSubCatByID(Request $request){
        $hotel_subcategory_id=$request->input('id');

        return HotelSubCategory::where('id',$hotel_subcategory_id)->first();
    }


     function HotelSubCatUpdate(Request $request){
        $hotel_subcategory_id=$request->input('id');

        return HotelSubCategory::where('id',$hotel_subcategory_id)->update([
            'sub_cat_name'=>$request->input('sub_cat_name')

        ]);
    }

    function HotelSubCategoryByID(Request $request){
        $hotel_subcategory_id=$request->input('id');
        return HotelSubCategory::where('id',$hotel_subcategory_id)->first();
    }



    function HotelSubCategoryUpdate(Request $request){
        $hotel_subcategory_id=$request->input('id');

        return HotelSubCategory::where('id',$hotel_subcategory_id)->update([
            'sub_cat_name'=>$request->input('sub_cat_name')
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\ResturentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResturentCategoryController extends Controller
{
    function ResturentSubCategoryAdminPage(){
        return view('pages.dashboard-admin.resturent-category-page');
    }

    function ResturentSubCategoryAdminList(Request $request){

           return ResturentCategory::get();
    }


    function ResturentSubCategoryAdminCreate(Request $request){

        return ResturentCategory::create([
            'name'=>$request->input('name'),

        ]);
    }

    function ResturentSubCategoryAdminDelete(Request $request){
        $resturent_category_id=$request->input('id');
        return ResturentCategory::where('id',$resturent_category_id)->delete();
    }

    function ResturentSubCatByID(Request $request){
        $resturent_category_id=$request->input('id');

        return ResturentCategory::where('id',$resturent_category_id)->first();
    }


     function ResturentSubCatUpdate(Request $request){
        $resturent_category_id=$request->input('id');

        return ResturentCategory::where('id',$resturent_category_id)->update([
            'name'=>$request->input('name')

        ]);
    }

    function HotelSubCategoryByID(Request $request){
        $hotel_subcategory_id=$request->input('id');
        return ResturentCategory::where('id',$hotel_subcategory_id)->first();
    }



    function HotelSubCategoryUpdate(Request $request){
        $hotel_subcategory_id=$request->input('id');

        return ResturentCategory::where('id',$hotel_subcategory_id)->update([
            'sub_cat_name'=>$request->input('sub_cat_name')
        ]);
    }

}

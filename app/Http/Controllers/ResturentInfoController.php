<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ResturentInfo;
use App\Models\ResturentCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ResturentInfoController extends Controller
{
    function ResturentInfoPage():View{
        return view('pages.dashboard-user.resturent-info-page');
    }


        function ResturentInfoList(Request $request)
    {
        $user_id = $request->header('id');
        return ResturentInfo::with('resturentcat')->where('user_id', $user_id)->get();
    }

    public function listResturentInfo() {
        $resturents = DB::table('resturents')
                        ->join('categories', 'resturents.resturent_category_id', '=', 'categories.id')
                        ->select('resturents.*', 'categories.name as category_name')
                        ->get();

        return response()->json($resturents);
    }



    function ResturentInfoCreate(Request $request){
        $user_id = $request->header('id');
        return ResturentInfo::create([
            'resturent_category_id' => $request->input('resturent_category_id'),
            'resturent_name' => $request->input('resturent_name'),
            'resturent_description' => $request->input('resturent_description'),
            'features' => $request->input('features'),
            'cuisines' => $request->input('cuisines'),
            'special_diets' => $request->input('special_diets'),
            'meals' => $request->input('meals'),
            'discount' => $request->input('discount'),
            'price_range_start' => $request->input('price_range_start'),
            'price_range_last' => $request->input('price_range_last'),
            'open_time' => $request->input('open_time'),
            'close_time' => $request->input('close_time'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image_one' => $request->input('image_one'),
            'image_two' => $request->input('image_two'),
            'image_three' => $request->input('image_three'),
            'image_four' => $request->input('image_four'),
            'user_id' => $user_id

        ]);
    }


    public function ResturentCatList()
    {
        return ResturentCategory::all();
    }

}



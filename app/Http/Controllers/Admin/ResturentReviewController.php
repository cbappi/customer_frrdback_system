<?php

namespace App\Http\Controllers\Admin;
use App\Models\ResturentReview;
use App\Models\ResturentCategory;
use App\Models\ResturentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResturentReviewController extends Controller
{
    function ResturentReviewPage():View{
        return view('pages.dashboard-admin.resturent-review-page');
    }

    function ResturentReviewList(Request $request)
    {

        return ResturentReview::with('resturent')->get();

    }

    public function ResturentInfoList()
    {
        return ResturentInfo::all();
    }

    public function ResturentCategory()
    {
        return ResturentCategory::all();
    }

    function ResturentReviewCreate(Request $request){

        return ResturentReview::create([
            'review_title'=>$request->input('review_title'),
            'review_des'=>$request->input('review_des'),
            'rating'=>$request->input('rating'),
            'gowith'=>$request->input('gowith'),
            'year'=>$request->input('year'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'resturent_info_id'=>$request->input('resturent_info_id'),
        ]);
    }
}

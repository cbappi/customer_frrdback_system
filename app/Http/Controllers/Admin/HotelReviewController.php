<?php

namespace App\Http\Controllers\Admin;
use App\Models\HotelReview;
use App\Models\HotelSubcategory;
use App\Helper\ResponseHelper;
use App\Models\HotelInfo;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HotelReviewController extends Controller
{

    function HotelReviewPage():View{
        return view('pages.dashboard-admin.hotel-review-page');
    }

    function HotelReviewList(Request $request)
    {

        return HotelReview::with('hotel')->get();

    }
    public function HotelInfoList()
    {
        return HotelInfo::all();
    }

    public function HotelCategory()
    {
        HotelSubcategory::all();
    }

    function HotelReviewCreate(Request $request){

        return HotelReview::create([
            'review_title'=>$request->input('review_title'),
            'review_des'=>$request->input('review_des'),
            'rating'=>$request->input('rating'),
            'gowith'=>$request->input('gowith'),
            'year'=>$request->input('year'),
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'hotel_info_id'=>$request->input('hotel_info_id'),
        ]);
    }

    // public function HotelReviewsById(Request $request, $id): JsonResponse {
    //     $data = HotelReview::where('id', $id)->with('hotel')->first();
    //     return ResponseHelper::Out('success', $data, 200);

    // }

    // public function HotelReviewsByHotelId(Request $request, $id): JsonResponse {
    //     $data = HotelReview::where('hotel_info_id',$request-> $id)->with('hotel')->get();
    //     return ResponseHelper::Out('success', $data, 200);

    //    }

    // public function showReviewsPage($hotel_info_id)
    //     {
    //         return view('hotel-reviews', compact('hotel_info_id'));
    //     }

    // public function getReviewsByHotel($hotel_info_id)
    //     {
    //         $reviews = HotelReview::where('hotel_info_id', $hotel_info_id)->get();
    //         return response()->json($reviews);

    //     }

    public function ListReviewsByHotelId(Request $request, $id): JsonResponse
    {
        $reviews = HotelReview::where('hotel_info_id', $id)->get();
        return response()->json(['status' => 'success', 'data' => $reviews], 200);
    }


}

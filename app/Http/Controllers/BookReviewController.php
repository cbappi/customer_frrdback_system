<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Helper\ResponseHelper;
use App\Models\BookInfo;
use Illuminate\Http\JsonResponse;
use App\Models\BookReview;
use Illuminate\Http\Request;

class BookReviewController extends Controller
{
    function BookReviewPage():View{
        return view('pages.dashboard-admin.book-review-page');
    }

    function BookReviewList(Request $request)
    {

        return BookReview::with('bookName')->get();

    }

    function BookReviewCreate(Request $request){

        return BookReview::create([
            'review_title'=>$request->input('review_title'),
            'review_des'=>$request->input('review_des'),
            'rating'=>$request->input('rating'),
            'review_type'=>$request->input('review_type'),

            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'book_name_id'=>$request->input('book_name_id'),
        ]);
    }

    public function ListReviewsByBookId(Request $request, $id): JsonResponse
    {
        $reviews = BookReview::where('book_info_id', $id)->get();
        return response()->json(['status' => 'success', 'data' => $reviews], 200);
    }
}

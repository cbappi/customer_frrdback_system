<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\BookInfo;
use App\Models\BookCategory;
use App\Models\BookName;
use Illuminate\Http\JsonResponse;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class BookInfoController extends Controller
{


    public function DetailsBookInfo(Request $request){
        return view("pages.details-book-page");
    }

    function BookInfoPage():View{
        return view('pages.dashboard-user.book-info-page');
       // Route::get('/bookinfoPage',[BookInfoController::class,'BookInfoPage'])->middleware([TokenVerificationMiddleware::class]);
    }

    function BookInfoList(Request $request)
    {
        $user_id = $request->header('id');
        $bookInfos = BookInfo::with('bookCategory')->where('user_id', $user_id)->get();
        return $bookInfos;
    }

    public function ListBookByCategory(Request $request, $id):JsonResponse{
        $data=BookInfo::where('book_category_id',$request->id)->with('bookCategory')->get();
        return ResponseHelper::Out('success',$data,200);

        //Route::get('/ListBookByCategory/{id}',[BookInfoController::class,'ListBookByCategory']);
    }

    // public function BookDetailsById(Request $request, $id): JsonResponse {
    //     $data = BookInfo::where('id', $id)->with('subcategory')->first();
    //     return ResponseHelper::Out('success', $data, 200);
    //      //Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
    // }



public function BookDetailsById(Request $request, $id): JsonResponse {
    $data = BookInfo::where('id', $id)->with('bookCategory')->first();
    return ResponseHelper::Out('success', $data, 200);
     //Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
}

}

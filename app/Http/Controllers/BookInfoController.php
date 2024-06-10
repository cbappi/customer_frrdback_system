<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\BookInfo;
use App\Models\BookCategory;
use App\Models\BookName;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class BookInfoController extends Controller
{
    function BookInfoPage():View{
        return view('pages.dashboard-user.book-info-page');
       // Route::get('/bookinfoPage',[BookInfoController::class,'BookInfoPage'])->middleware([TokenVerificationMiddleware::class]);
    }

    function BookInfoList(Request $request)
    {
        $user_id = $request->header('id');
        $bookInfos = BookInfo::with(['bookCategory', 'bookName'])->where('user_id', $user_id)->get();

        return $bookInfos;

        //Route::get('/list-book-info',[BookInfoController::class,'BookInfoList'])->middleware([TokenVerificationMiddleware::class]);
    }


}

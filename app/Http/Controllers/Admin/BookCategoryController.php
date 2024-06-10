<?php

namespace App\Http\Controllers\Admin;
use App\Models\BookCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{

    function BookCategoryAdminPage(){
        return view('pages.dashboard-admin.book-category-page');
        //Route::get('/bookcategoryadminPage',[BookCategoryController::class,'BookCategoryAdminPage']);
    }

    function BookCategoryAdminList(Request $request){

        return BookCategory::get();
        //Route::get('/list-book-category',[BookCategoryController::class,'BookCategoryAdminList']);
 }


 function BookCategoryAdminCreate(Request $request){

     return BookCategory::create([
         'name'=>$request->input('name'),
         'imgcat'=>$request->input('imgcat'),

     ]);
     //Route::post("/create-book-category",[BookCategoryController::class,'BookCategoryAdminCreate']);
 }

    function BookListByCategoryFrontPage(){
        return view('pages.by-category-hotel');
    }


    function BookFrontPage(){
        return view('pages.book');
    }
}

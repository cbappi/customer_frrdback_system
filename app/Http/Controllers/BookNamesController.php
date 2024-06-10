<?php

namespace App\Http\Controllers;

use App\Models\BookName;
use Illuminate\Http\Request;

class BookNamesController extends Controller
{
    function BookNameAdminPage(){
        return view('pages.dashboard-admin.book-name-page');
        //Route::get('/booknameadminPage',[BookNamesController::class,'BookNameAdminPage']);
    }

    function BookNameAdminList(Request $request){

        return BookName::get();
        //Route::get('/list-book-name',[BookNamesController::class,'BookNameAdminList']);
 }


 function BookNameAdminCreate(Request $request){

     return BookName::create([
         'name'=>$request->input('name'),


     ]);
     //Route::post("/create-book-name",[BookNamesController::class,'BookNameAdminCreate']);
 }
}

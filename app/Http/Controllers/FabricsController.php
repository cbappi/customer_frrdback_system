<?php


namespace App\Http\Controllers;
use App\Models\Fabric;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FabricsController extends Controller
{
    function FabricPage():View{

        return view('pages.dashboard.fabric-page');
    }

    function FabricList()
    {

        return Fabric::get();

    }


    function FabricCreate(Request $request){
        $user_id=$request->header('id');
        return Fabric::create([
            'fabname'=>$request->input('fabname'),
            'unitprice'=>$request->input('unitprice'),
            'user_id'=>$user_id
        ]);
    }
}

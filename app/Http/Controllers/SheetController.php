<?php

namespace App\Http\Controllers;
use App\Models\Element;
use App\Models\Fabric;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Sheet;
use App\Models\SheetAccessory;
use App\Models\SheetFabric;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SheetController extends Controller
{

    function SheetPage():View{
        return view('pages.dashboard.sheet-page');
    }

    function SalePage():View{
        return view('pages.dashboard.cost-page');
    }

    function sheetCreate(Request $request){

        DB::beginTransaction();

        try {

        $user_id=$request->header('id');
        $total=$request->input('total');
        $totalfabric=$request->input('totalfabric');
        $cm=$request->input('cm');
        $wash=$request->input('wash');
        $print=$request->input('print');
        $emb=$request->input('emb');
        $com=$request->input('com');
        $payable=$request->input('payable');


        $learner_id=$request->input('learner_id');

        $sheet= Sheet::create([
            'total'=>$total,
            'totalfabric'=>$totalfabric,
            'print'=>$print,
            'wash'=>$wash,
            'cm'=>$cm,
            'emb'=>$emb,
            'com'=>$com,
            'payable'=>$payable,
            'user_id'=>$user_id,
            'learner_id'=>$learner_id,
        ]);

       $sheetID=$sheet->id;

       $elements= $request->input('elements');

       foreach ($elements as $EachElement) {
            SheetAccessory::create([
                'sheet_id' => $sheetID,
                'user_id'=>$user_id,
                'element_id' => $EachElement['element_id'],
                'qty' =>  $EachElement['qty'],
                'sale_price' =>  $EachElement['sale_price'],
            ]);
        }

        $fabrics= $request->input('fabrics');

        foreach ($fabrics as $EachFabric) {
             SheetFabric::create([
                 'sheet_id' => $sheetID,
                 'user_id'=>$user_id,
                 'fabric_id' =>$EachFabric['fabric_id'],
                 'qty' =>  $EachFabric['qty'],
                 'sale_price' =>  $EachFabric['sale_price'],
             ]);
         }

       DB::commit();

       return 1;

        }
        catch (Exception $e) {
            DB::rollBack();
            return 0;
        }

    }

    function sheetSelect(Request $request){
        $user_id=$request->header('id');
        return Sheet::where('user_id',$user_id)->with('learner')->get();
    }

}






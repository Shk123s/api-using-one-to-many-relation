<?php

namespace App\Http\Controllers;
use App\employe;
use App\attendance;
use App\postapi;


use Illuminate\Http\Request;
use DB;

class showcontroller extends Controller
{   public function index()        { 
    $emp = employe::with('attendance')->get();
    return response()->json($emp);
}
    public function show($id) {
    $users = DB::table('emptable')
    ->join('attendance', 'emptable.id','=','emp_id')
    ->select('attendance.*','emptable.*')->where('attendance.id',$id)
    ->get();
    return $users;
        // return employe::where('id', $id)->with('attendance')->first();
//another way of doing this is correct method of doing joins using laravel function 
//     $tt = attendance::where('Emp_id',$id)->first();
 
//     $em = employe::find($id);
//     $daTA = compact('tt','em');
//    echo attendance::where('Emp_id',$id)->first()
//    ->join(employe::where('Emp_id',$id)->first());

//  $d =   DB::table('attendance')
//  ->leftJoin('emptable','attendance.Emp_id','=','emptable.Emp_id')
//  ->get();
// echo $id;
// $d = DB::table('attendance')
//  ->join('emptable',function($join){
//     $join->on('attendance.Emp_id','=','emptable.Emp_id')
//     ->where('emptable.Emp_id','=',$id);
//  })->get();
// $d = employe::find(1)->attendance;

// select * from `emptable` INNER JOIN `attendance` ON attendance.Emp_id AND emptable.Emp_id = 1;

// $d = attendance::where('Emp_id',$id)->first();
    // return response()->json($d);
} 
public function post(Request $request)
    {   $po = new postapi(); 
        $po->id = $request->id;
        $po->emp_id  = $request->emp_id;
        $po->attendance = $request->attendance;
        $po->save();

        if ($po = true) {
            echo "post added successfully ";
        }
        else {
            echo " mst nhi hua ree";
        }

        return response()->json($po);

    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Trainer;
use App\Models\Active;
use App\Models\Plan;
use DB;
use Validator;

class ActiveController extends Controller
{
    public function Actives(){
        $members = DB::table('members')
        ->select('*')
        ->selectRaw("CONCAT(lastname, ', ', firstname, ' ', middlename) as name")
        ->get();

        $trainers = DB::table('trainers')
        ->select('trainers.*', DB::raw("CONCAT(members.lastname, ', ', members.firstname, ' ', members.middlename) as name"))
        ->join('members', 'members.firstname' ,'=', 'trainers.member_id')
        ->get();

        $plans = DB::table('plans')->get();

        $packages = DB::table('packages')->get();

        $actives = DB::table('actives')
        ->select('actives.*', DB::raw("CONCAT(members.lastname, ', ', members.firstname, ' ', members.middlename) as name"),
                              DB::raw("CONCAT(plan_name) as plan"),
                              DB::raw("CONCAT(package_name) as package")
                              )
        ->join('members', 'members.member_id' ,'=', 'actives.member_id')
        ->join('trainers', 'trainers.member_id' ,'=', 'actives.trainer_id')
        ->join('plans', 'plans.id', '=', 'actives.plan_id')
        ->join('packages', 'packages.id', '=', 'actives.package_id')
        ->get();

        return view('backend.active.actives', compact('members', 'trainers', 'plans', 'actives', 'packages'));
    }

    public function AddActives(Request $request){
        $valid = Validator::make($request->all(), [
            'member_id' => 'required',
            'plan_id' => 'required',
            'package_id' => 'required',
            'trainer_id' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.actives')->with($fail);

        } else {
            $checkId = $request->plan_id;
            $check = DB::table('plans')
            ->select('*')
            ->where('id', '=', $request->plan_id)
            ->first();

            $currentDate = date('Y-m-d H:i:s');
            $date = '';
            if($checkId){
                $date = date('Y-m-d', strtotime($currentDate. '+'.$check->plan_name));

            DB::table('actives')->insert([
                'member_id' => $request->member_id,
                'plan_id' => $request->plan_id,
                'package_id' => $request->package_id,
                'trainer_id' => $request->trainer_id,
                'status' => 'active',
                'start_date' => $currentDate,
                'end_date' => $date,
                'created_at' => $currentDate,
            ]);

            $success = array(
                'message' => 'Success, Active Member Added',
                'alert-type' => 'success',
            );

            return redirect()->route('all.actives')->with($success);
        }
        $fail = array(
            'message' => 'Error, Try Again!',
            'alert-type' => 'error',
        );

        return redirect()->route('all.actives')->with($fail); 
        }

    }
    public function ViewActives($id){
        $active = Active::findorFail($id);
        return response()->json([
            'status'=>200,
            'active'=>$active,
        ]);
    }
}
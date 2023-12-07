<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class PlansController extends Controller
{
    public function Plans(){
        $plans = DB::table('plans')->get();
        return view('backend.plans.plans', compact('plans'));
    }

    public function AddPlan(Request $request){
        $valid = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_price' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.plans')->with($fail);
        } else {
            DB::table('plans')->insert([
                'plan_name' => $request->plan_name,
                'plan_price' => $request->plan_price,
            ]);

            $success = array(
                'message' => 'Sucess, Added New Plans',
                'alert-type' => 'success',
            );

            return redirect()->route('all.plans')->with($success);
        }
    }
}
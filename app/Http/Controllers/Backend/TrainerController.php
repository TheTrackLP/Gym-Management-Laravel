<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class TrainerController extends Controller
{
    public function Trainers(){
        $members = DB::table('members')->get();

        $trainers = DB::table('trainers')
        ->select('trainers.*', 'members.contact')
        ->join('members', 'members.firstname', '=', 'trainers.member_id')
        ->get();
    
        return view('backend.trainer.trainers', compact('members', 'trainers'));
    }

    public function AddTrainers(Request $request){
        $valid = Validator::make($request->all() ,[
            'member_id' => 'required',
            'rate' => 'required',
        ]);
        
        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.trainers')->with($fail);
        }else{
            DB::table('trainers')->insert([
                'member_id' => $request->member_id,
                'rate' => $request->rate,
            ]);

            $success = array(
                'message' => 'Success, Trainer Added',
                'alert-type' => 'success',
            );
            
            return redirect()->route('all.trainers')->with($success);
        }
    }
}
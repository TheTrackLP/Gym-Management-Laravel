<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Split;
use App\Models\Exercise;

class SplitController extends Controller
{
    public function AllSplit(){
        $splits = DB::table('splits')
                        ->select('splits.*')
                        ->selectRaw("CONCAT(exercises.id) as exerc")
                        ->leftjoin('exercises', 'exercises.id', '=', 'splits.exer_id')
                        ->get();
        return view('backend.splits.splits', compact('splits'));
    }
    
    public function AddSplit(){
        $exer = Exercise::all();
        return view('backend.splits.add_split', compact('exer'));
    }

    public function StoreSplit(Request $request){
        $valid = Validator::make($request->all(),[
            'split_name' => 'required',
            'split_desc' => 'required',
            'exer_id' => 'required',
        ]);

        if($valid->fails()){
            $fail = [
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            ];
            return redirect()->route('all.split')->with($fail);
        } else {
            // $data = [];
            // $exer = $request->exer_id;

            // foreach ($exer as $key => $value) {
            //     $data['exer_id'] = $value;
            //     $data['split_name'] = $request->split_name;
            //     $data['split_desc'] = $request->split_desc;

            //     DB::table('splits')->insert($data);
            // }

                Split::create([
                    'exer_id' => json_encode($request->exer_id),
                    'split_name' => $request->split_name,
                    'split_desc' => $request->split_desc,
                ]);

            $success = [
                'message' => 'Split Created Successfully',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.split')->with($success);
        }
    }
}
<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Trainer;

class TrainerController extends Controller
{
    public function AllTrainers(){
        $trainers = Trainer::all();
        return view('backend.trainers.trainers', compact('trainers'));
    }

    public function AddTrainers(Request $request){
        $valid = Validator::make($request->all(),[
            'trainer_name' => 'required',
            'trainer_contact' => 'required',
            'trainer_rate' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.trainers')->with($fail);
        } else {
            $trainers = Trainer::create([
                'trainer_name' => $request->trainer_name,
                'trainer_contact' => $request->trainer_contact,
                'trainer_rate' => $request->trainer_rate,
            ]);

            $success = array(
                'message' => 'Trainer Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.trainers')->with($success);
        }
    }

    public function DeleteTrainers($id){
        Trainer::findorfail($id)->delete();
        $delete = array(
            'message' => 'Trainer Deleted Successfully',
            'alert-type' => 'warning',
        );

        return redirect()->route('all.trainers')->with($delete);
    }
}
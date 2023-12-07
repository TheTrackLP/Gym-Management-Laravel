<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function Exercises(){
        $exercises = DB::table('exercises')->get();
        return view('backend.exercise.exercises', compact('exercises'));
    }

    public function AddExercise(Request $request){
        $valid = Validator::make($request->all(), [
            'muscle_name' => 'required',
            'muscle_description' => 'required',
            'muscle_group' => 'required',
            'muscle_image' => 'required',
        ]);

        if($valid->fails()){
            $fails = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.exercise')->with($fails);

        } else {
            $image = $request->file('muscle_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Save the image to the public/images directory
    
            DB::table('exercises')->insert([
                'muscle_name' => $request->muscle_name,
                'muscle_description' => $request->muscle_description,
                'muscle_group' => $request->muscle_group,
                'muscle_image' => $imageName,
            ]);

            $success = array(
                'message' => 'Success, Exercise Added',
                'alert-type' => 'success',
            );
            
            return redirect()->route('all.exercise')->with($success);
        }
    }

    public function EditExercise($id){
        $exercise = Exercise::findorfail($id);
        return response()->json([
            "status"=>200,
            "exercise"=>$exercise,
        ]);
    }
}
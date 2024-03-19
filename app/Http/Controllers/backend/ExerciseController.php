<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function AllExercises(){
        $exer = Exercise::all();
        return view('backend.exercises.exercises', compact('exer'));
    }

    public function AddExercise(Request $request){
        $valid = Validator::make($request->all(), [
            'exer_name' => 'required',
            'exer_desc' => 'required',
            'exer_image' => 'required',
        ]);

        if($valid->fails()) {
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.exercise')->with($fail);
        } else {
            $image = $request->file('exer_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            Exercise::create([
                'exer_name' => $request->exer_name,
                'exer_desc' => $request->exer_desc,
                'exer_image' => $imageName,
            ]);
            $success = array(
                'message' => 'Exercise Added Succeefully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.exercise')->with($success);
        }
    }

    public function DeleteExer($id){
        $exer = Exercise::findorfail($id);
        $filePath = 'images/' . $exer->exer_image;

        if(file_exists(public_path('images/'.$exer->exer_image))){
            $fileDelete = unlink(public_path('images/'. $exer->exer_image));
        }

        $exer->delete();
        
        $delete = array(
            'message' => 'Exercise Deleted Successfully',
            'alert-type' => 'warning',
        );

        return redirect()->route('all.exercise')->with($delete);
    }

    public function EditExer($id){
        $exer = Exercise::findorfail($id);
        return response()->json([
            'status'=>200,
            'exer'=>$exer,
        ]);
    }

    public function UpdateExer(Request $request){
        $exer_id = $request->id;

        $valid = Validator::make($request->all(), [
            'exer_name' => 'required',
            'exer_desc' => 'required',
            'exer_image' => 'required',
        ]);

        if($valid->fails()) {
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.exercise')->with($fail);
        } else {

            $image = $request->file('exer_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            Exercise::findorfail($exer_id)->update([
                'eXer_name' => $request->exer_name,
                'exer_desc' => $request->exer_desc,
                'exer_image' => $imageName,
            ]);

            $success = array(
                'message' => 'Exercise Updated Successfully',
                'alert-type' => 'succcess',
            );

            return redirect()->route('all.exercise')->with($success);
        }
    }
}
<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use Hash;
use App\Models\Members;

class MembersController extends Controller
{
    public function Members(){
        $members =  DB::table('members')
        ->select('*')
        ->selectraw("CONCAT(lastname, ', ', firstname, ' ', middlename) as name")
        ->get();
        return view('backend.members.members', compact('members'));
    }

    public function AddMembers(Request $request){
        $valid = Validator::make($request->all(), [
            'member_id' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'occupation' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.members')->with($fail);
        } else{
            $date = date('y-m-d');
            DB::table('members')->insert([
                'member_id' => $request->member_id,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'occupation' => $request->occupation,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'address' => $request->address,
                'created_at' => $date,
            ]);

            DB::table('users')->insert([
                'member_id' => $request->member_id,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            
            $success = array(
                'message' => 'Success, Member Added',
                'alert-type' => 'success',
            );
            return redirect()->route('all.members')->with($success);
        }
    }

    public function EditMembers($id){
        $member = Members::findorfail($id);
        return response()->json([
            'status'=>200,
            'member'=>$member,
        ]);
    }

    public function UpdateMember(Request $request){
        $mid = $request->id;
        $date = date('Y-m-d');
        $valid = Validator::make($request->all(), [
            'member_id' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'occupation' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);
        
        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.members')->with($fail);
        }else{            
            Members::findorfail($mid)->update([
                'member_id' => $request->member_id,
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'occupation' => $request->occupation,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'address' => $request->address,
                'updated_at' => $date,
            ]);

            $success = array(
                'message' => 'Success, Member Updated!',
                'alert-type' => 'success',
            );

            return redirect()->route('all.members')->with($success);
        }
    }
}
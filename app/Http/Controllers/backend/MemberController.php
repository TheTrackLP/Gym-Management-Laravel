<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Member;
use App\Models\Plan;
use App\Models\Package;

class MemberController extends Controller
{
    public function AllMembers(){
        $members = DB::table('members')
                        ->select('members.*')
                        ->selectRaw("CONCAT(plans.plan_name) as plan")
                        ->selectRaw("CONCAT(packages.package_name) as package")
                        ->join('plans', 'plans.id', '=', 'members.plan_id')
                        ->join('packages', 'packages.id', '=', 'members.package_id')
                        ->get();
        $plans = Plan::all();
        $packages = Package::all();
        return view('backend.members.members', compact('members', 'plans', 'packages'));
    }

    public function AddMember(Request $request){
        $valid = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Tray Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.members')->with($fail);
        } else {
            $planId = $request->plan_id;
            $check = DB::table('plans')
                        ->select('*')
                        ->where('id', $planId)
                        ->first();

            $currentDate = date('Y-m-d H:i:s');
            $date = '';
            if($planId){
                $date = date('Y-m-d', strtotime($currentDate. '+'.$check->plan_name));
            }

            Member::create([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'address' => $request->address,
                'plan_id' => $request->plan_id,
                'package_id' => $request->package_id,
                'end_date' => $date,
            ]);

            $success = array(
                'message' => 'Member Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.members')->with($success);
        }
    }

    public function ViewMember($id){
        $members = Member::findorfail($id);
        return response()->json([
            'status'=>200,
            'members'=>$members,
        ]);
    }

    public function UpdateMember(Request $request){
        $member_id = $request->id;
        
        $valid = Validator::make($request->all(),[
            'fullname' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.members')->with($fail);
        } else {
            $planId = $request->plan_id;
            $check = DB::table('plans')
                        ->select('*')
                        ->where('id', $planId)
                        ->first();

            $currentDate = date('Y-m-d H:i:s');
            $date = '';
            if($planId){
                $date = date('Y-m-d', strtotime($currentDate. '+'.$check->plan_name));
            }
            $member = Member::findorfail($member_id)->update([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'address' => $request->address,
                'plan_id' => $request->plan_id,
                'package_id' => $request->package_id,
                'end_date' => $date,
            ]);

            $success = array(
                'message' => 'Renewed Member Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.members')->with($success);
        }
    }

    public function DeleteMember($id){
        Member::findorfail($id)->delete();
        $delete = array(
            'message' => 'Member Deleted Successfully',
            'alert-type' => 'warning',
        );
        
        return redirect()->route('all.members')->with($delete);
    }
}
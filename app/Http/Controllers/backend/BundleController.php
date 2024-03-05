<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Plan;
use App\Models\Package;

class BundleController extends Controller
{
    public function AllBundles(){
        $plans = Plan::all();
        $packages = Package::all();
        return view('backend.bundles.bundles', compact('plans', 'packages'));
    }

    public function AddPlan(Request $request){
        $valid = Validator::make($request->all(),[
            'plan_name' => 'required',
            'plan_price' => 'required',
        ]);

        if($valid->fails()){
            $fails = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.bundles')->with($fails);
        } else {
            Plan::create([
                'plan_name' => $request->plan_name,
                'plan_price' => $request->plan_price,
            ]);

            $success = array(
                'message' => 'Plan Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.bundles')->with($success);
        }
    }

    public function AddPackage(Request $request){
        $valid = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_desc' => 'required',
            'package_price' => 'required',
        ]);

        if($valid->fails()){
            $fails = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.bundles')->with($fails);
        } else {
            Package::create([
                'package_name' => $request->package_name,
                'package_desc' => $request->package_desc,
                'package_price' => $request->package_price,
            ]);

            $success = array(
                'message' => 'Package Added Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.bundles')->with($success);
        }
    }
}
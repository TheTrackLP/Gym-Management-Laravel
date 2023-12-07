<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use DB;
use Validator;

class PackageController extends Controller
{
    public function Packages(){
        $packages = DB::table('packages')->get();
        return view('backend.package.packages', compact('packages'));
    }

    public function AddPackages(Request $request){
        $valid = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_description' => 'required',
            'package_amount' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );

            return redirect()->route('all.packages')->with($fail);
        }else {
            DB::table('packages')->insert([
                'package_name' => $request->package_name,
                'package_description' => $request->package_description,
                'package_amount' => $request->package_amount,
            ]);

            $success = array(
                'message' => 'Success, Package Added',
                'alert-type' => 'success',
            );

            return redirect()->route('all.packages')->with($success);
        }
    }

    public function DeletePackages($id){
        Package::findorfail($id)->delete();

        $notif = array(
            'message' => 'Deleted, Package Delete',
            'alert-type' => 'warning',
        );

        return redirect()->route('all.packages')->with($notif);

    }
}
<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use DB;
use Validator;

class EquipmentController extends Controller
{
    public function AllEquipments(){
        $equips = Equipment::all();
        return view('backend.equipments.equipments', compact('equips'));
    }

    public function AddEquipment(Request $request){
        $valid = Validator::make($request->all(), [
            'e_name' => 'required',
            'e_desc' => 'required',
            'e_date' => 'required',
            'e_qty' => 'required',
            'e_vendor' => 'required',
            'e_address' => 'required',
            'e_contact' => 'required',
            'e_price' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.equip')->with($fail);
        } else {
            $equip = Equipment::create([
                'e_name' => $request->e_name,
                'e_desc' => $request->e_desc,
                'e_date' => $request->e_date,
                'e_qty' => $request->e_qty,
                'e_vendor' => $request->e_vendor,
                'e_address' => $request->e_address,
                'e_contact' => $request->e_contact,
                'e_price' => $request->e_price,
            ]);
            $success = array(
                'message' => 'Equipment Added Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.equip')->with($success);
        }
    }

    public function EditEquipment($id){
        $equips = Equipment::findorfail($id);
        return response()->json([
            'status'=>200,
            'equips'=>$equips,
        ]);
    }

    public function UpdateEquipment(Request $request){
        $equip_id = $request->id;

        $valid = Validator::make($request->all(), [
            'e_name' => 'required',
            'e_desc' => 'required',
            'e_date' => 'required',
            'e_qty' => 'required',
            'e_vendor' => 'required',
            'e_address' => 'required',
            'e_contact' => 'required',
            'e_price' => 'required',
        ]);

        if($valid->fails()){
            $fail = array(
                'message' => 'Error, Try Again!',
                'alert-type' => 'error',
            );
            return redirect()->route('all.equip')->with($fail);
        } else {
            $equip = Equipment::findorfail($equip_id)->update([
                'e_name' => $request->e_name,
                'e_desc' => $request->e_desc,
                'e_date' => $request->e_date,
                'e_qty' => $request->e_qty,
                'e_vendor' => $request->e_vendor,
                'e_address' => $request->e_address,
                'e_contact' => $request->e_contact,
                'e_price' => $request->e_price,
            ]);
            $success = array(
                'message' => 'Equipment Updated Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.equip')->with($success);
        }
    }

    public function DeleteEquip($id){
        Equipment::findorfail($id)->delete();
        $delete = array(
            'message' => 'Equipment Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('all.equip')->with($delete);
    }
}
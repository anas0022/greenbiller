<?php

namespace App\Http\Controllers;

use App\Models\Coresetting;
use App\Models\countrysettings;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Tax;

class SettingsController extends Controller
{
    public function tax(){
        $tax = Tax::all();
        $logo = Coresetting::all();
        return view('admin.settings.taxlist', compact('tax','logo'));
    }
    public function tax_post(Request $request){
        $request -> validate(['name'=> 'required','per' => 'required']);

            $tax = new Tax();
            $tax -> taxname = $request->input('name');
            $tax -> per = $request->input('per');
            if($tax->save()){
                return back()->with('success','Tax Added Succesfully');
            }
            return back()->withErrors('Tax Not Added');
    }

    public function tax_edit(Request $request) 
    {
        
    
        // Find the tax by ID
        $tax = Tax::find($request->input('id'));
    
        if ($tax) {
            // Update tax properties
            $tax->taxname = $request->input('name');
            $tax->per = $request->input('per');
    
            // Save the changes
            if ($tax->save()) {
                return redirect()->route('tax')->with('success', 'Tax updated successfully');
            }
    
            return redirect()->route('tax')->with('error', 'Failed to update tax');
        }
    
        // If tax is not found
        return redirect()->route('tax')->with('error', 'Tax not found');
    }
    
    public function tax_delete(Request $request){
        $brand  = Tax::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }}
        public function tax_status(Request $request){
            $brands = Tax::find($request->input('id'));
    
            if ($brands) {
                // Toggle the status
                $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
                $brands->save();
        
                return redirect()->route('unit')->with('success', 'Status updated successfully.');
            }
        
            return back()->withErrors('The status could not be updated.');
        }
        public function unit(){
            $unit = Unit::orderBy('created_at', 'desc')->get();
            $logo = Coresetting::all();
            return view('admin.settings.unitlist', compact('unit','logo'));
        }
        
        public function unit_post(Request $request){
            $request -> validate(['name'=> 'required','dis'=>'required']);

            $unit = new Unit();

            $unit -> unit_name = $request -> input('name');
            $unit -> discription = $request -> input('dis');
            
            if($unit->save()){
                return back()->with('success' , 'unit added successfully');
            }
            return back()->withErrors('unit not added');
        }
        public function unit_edit(Request $request) 
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'dis' => 'required|string',  
            ]);
        
            // Check the ID being passed
            $unit = Unit::find($request->input('id'));
        
            if ($unit) {
                $unit->unit_name = $request->input('name');
                $unit->discription = $request->input('dis');  // Ensure this matches your database column
        
                if ($unit->save()) {
                    return redirect()->route('unit')->with('success', 'Unit updated successfully');
                }
        
                return redirect()->route('unit')->with('error', 'Failed to update unit');
            } else {
                return redirect()->route('unit')->with('error', 'Unit not found');
            }
        }
        public function unit_status(Request $request){
            $brands = Unit::find($request->input('id'));
    
            if ($brands) {
                // Toggle the status
                $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
                $brands->save();
        
                return redirect()->route('unit')->with('success', 'Status updated successfully.');
            }
        
            return back()->withErrors('The status could not be updated.');
        }
        public function unit_delete(Request $request){
            $brand  = Unit::where('id',$request->input('id'));

            if($brand->delete()){
                return back()->with('success' ,'Deleted successfully');
            }}


            public function country(){
                $logo = Coresetting::all();
                $countrysettings = countrysettings::all();
                return view('admin.settings.countrysettings',compact('countrysettings','logo'));
            }
            public function country_post(Request $request){
                $countrysettings = new countrysettings();

                $countrysettings->name = $request->input('country_name');
                $countrysettings->mobile_code = $request->input('country_code');
                $countrysettings->currency_symble =$request->input('currency_symbol');
                $countrysettings->currency_code = $request->input('currency_code');
                if($countrysettings->save()){
                    return back()->with('success','country settings added');
                }
                return back()->with('error','settings not added');
            }
    public function updateStatus_tax(Request $request){
        $brands = countrysettings::find($request->input('id'));
    
        if ($brands) {
            // Toggle the status
            $brands->status = $brands->status == 'active' ? 'inactive' : 'active';
            $brands->save();
    
            return back()->with('success', 'Status updated successfully.');
        }
    
        return back()->withErrors('The status could not be updated.');
    }
    public function deletecountry(Request $request){
        $brand  = countrysettings::where('id',$request->input('id'));

        if($brand->delete()){
            return back()->with('success' ,'Deleted successfully');
        }
    }
    }


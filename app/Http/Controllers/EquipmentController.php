<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipment;
use App\EquipmentType;
use App\Brand;
use App\AccountabilityForm;

use Carbon\Carbon;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::all();

        return view('equipment.index')
            ->with('equipment', $equipment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment_types = EquipmentType::where('id','!=', 2)->get();
        $laptop_brands = Brand::where('equipment_types_id', 1)->get();
        $phone_brands = Brand::where('equipment_types_id', 2)->get();
        $rf_gun_brands = Brand::where('equipment_types_id', 3)->get();
        $desktop_brands = Brand::where('equipment_types_id', 4)->get();
        $external_drive_brands = Brand::where('equipment_types_id', 5)->get();

        return view('equipment.create')
            ->with('equipment_types', $equipment_types)
            ->with('laptop_brands', $laptop_brands)
            ->with('phone_brands', $phone_brands)
            ->with('rf_gun_brands', $rf_gun_brands)
            ->with('desktop_brands', $desktop_brands)
            ->with('external_drive_brands', $external_drive_brands)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validation
         $request->validate([
            // 'calamity' => 'required',
            // 'narrative' => 'required|string|max:255',
        ]);

        $equipment = new Equipment;
        // For laptop, RF gun, desktop, external drive
        $equipment->equipment_types_id = $request->get('equipment_types_id');
        $equipment->it_tag = $request->get('it_tag');
        $equipment->asset_tag = $request->get('asset_tag');
        $equipment->name = $request->get('name');
        $equipment->brands_id = $request->get('brands_id');
        $equipment->specifications = $request->get('specifications');
        $equipment->serial_number = $request->get('serial_number');
        $equipment->unit_cost = $request->get('unit_cost');
        $equipment->date_purchased = Carbon::parse($request->date_purchased);
        $equipment->date_issued = Carbon::parse($request->date_issued);
        // $equipment->quantity = $request->get('quantity');
        // $equipment->active = false;
        $equipment->notes = $request->get('notes');

        $equipment->equipment_statuses_id = 3; // Equipment will be inactive when added.

        // For phone
        $equipment->plan = $request->get('plan');
        $equipment->calls = $request->get('calls');
        $equipment->text = $request->get('text');
        $equipment->local_calls = $request->get('local_calls');
        $equipment->local_text = $request->get('local_text');
        $equipment->consumable = $request->get('consumable');
        $equipment->ndd = $request->get('ndd');
        $equipment->idd = $request->get('idd');
        $equipment->data = $request->get('data');
        $equipment->roaming = $request->get('roaming');
        $equipment->save();



        return redirect()->route('equipment.index')->with('success','Equipment Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::findOrFail($id);
        $acc_forms = AccountabilityForm::where('equipment_id', $id)->get();

        return view('equipment.show')
            ->with('equipment', $equipment)
            ->with('acc_forms', $acc_forms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        // $acc_forms = AccountabilityForm::where('equipment_id', $id)->get();
        $equipment_types = EquipmentType::where('id','!=', 2)->get();
        $laptop_brands = Brand::where('equipment_types_id', 1)->get();
        $phone_brands = Brand::where('equipment_types_id', 2)->get();
        $rf_gun_brands = Brand::where('equipment_types_id', 3)->get();
        $desktop_brands = Brand::where('equipment_types_id', 4)->get();
        $external_drive_brands = Brand::where('equipment_types_id', 5)->get();

        return view('equipment.edit')
            ->with('equipment', $equipment)
            // ->with('acc_forms', $acc_forms)
            ->with('equipment_types', $equipment_types)
            ->with('laptop_brands', $laptop_brands)
            ->with('phone_brands', $phone_brands)
            ->with('rf_gun_brands', $rf_gun_brands)
            ->with('desktop_brands', $desktop_brands)
            ->with('external_drive_brands', $external_drive_brands)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        // For laptop, RF gun, desktop, external drive
        $equipment->equipment_types_id = $request->get('equipment_types_id');
        $equipment->it_tag = $request->get('it_tag');
        $equipment->asset_tag = $request->get('asset_tag');
        $equipment->name = $request->get('name');
        $equipment->brands_id = $request->get('brands_id');
        $equipment->specifications = $request->get('specifications');
        $equipment->serial_number = $request->get('serial_number');
        $equipment->unit_cost = $request->get('unit_cost');
        $equipment->date_purchased = Carbon::parse($request->date_purchased);
        $equipment->date_issued = Carbon::parse($request->date_issued);
        // $equipment->quantity = $request->get('quantity');
        // $equipment->active = false;
        $equipment->notes = $request->get('notes');

        // $equipment->equipment_statuses_id = 3; // Equipment will be inactive when added.

        // For phone
        $equipment->plan = $request->get('plan');
        $equipment->calls = $request->get('calls');
        $equipment->text = $request->get('text');
        $equipment->local_calls = $request->get('local_calls');
        $equipment->local_text = $request->get('local_text');
        $equipment->consumable = $request->get('consumable');
        $equipment->ndd = $request->get('ndd');
        $equipment->idd = $request->get('idd');
        $equipment->data = $request->get('data');
        $equipment->roaming = $request->get('roaming');
        $equipment->save();



        return redirect()->route('equipment.index')->with('success','Equipment Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
  
        return redirect()->route('equipment.index')
                        ->with('success','Equipment Removed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $equipment = Equipment::findOrFail($id);
        // $equipment->delete();
  
        return view('equipment.delete')
                ->with('equipment',$equipment);
    }
}

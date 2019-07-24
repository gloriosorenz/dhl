<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\EquipmentType;


class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index')
            ->with('brands', $brands)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment_types = EquipmentType::all();

        return view('brands.create')
            ->with('equipment_types', $equipment_types)
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
            'name'  => 'required',
            'equipment_types_id'  => 'required',
            'logo' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('logo')){
            // Get filename with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store 
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('logo')->storeAs('public/logos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpeg';
        };


        // Create brand
        $brand = new Brand;
        $brand->name = $request->get('name');
        $brand->equipment_types_id = $request->get('equipment_types_id');
        $brand->logo = $fileNameToStore;
        $brand->save();

        return redirect()->route('brands.index')->with('success','Brand Created ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brands.edit')
            ->with('brand', $brand)
            ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $equipment_types = EquipmentType::all();

        return view('brands.edit')
            ->with('brand', $brand)
            ->with('equipment_types', $equipment_types)
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

        // Validation
        $request->validate([
            'name'  => 'required',
            'equipment_types_id'  => 'required',
            'logo' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('logo')){
            // Get filename with extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename 
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store 
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('logo')->storeAs('public/logos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpeg';
        };


        // Create brand
        $brand = Brand::findOrFail($id);
        $brand->name = $request->get('name');
        $brand->equipment_types_id = $request->get('equipment_types_id');
        $brand->logo = $fileNameToStore;
        $brand->save();

        return redirect()->route('brands.index')->with('success','Brand Updated ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
  
        return redirect()->route('brands.index')
                        ->with('success','Brand Removed');
    }
}

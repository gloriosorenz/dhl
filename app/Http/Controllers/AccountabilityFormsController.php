<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountabilityForm;
use App\RequestForm;
use App\User;
use App\Equipment;

use PDF;
use Carbon\Carbon;

class AccountabilityFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc_forms = AccountabilityForm::all();

        // dd($acc_forms);
        return view('accountability_forms.index')
            ->with('acc_forms', $acc_forms)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $request = RequestForm::findOrFail($id);
        $employees = User::all();
        $equipment = Equipment::where('quantity', '!=', 0)->get();

        return view('accountability_forms.create')
            ->with('equipment', $equipment)
            ->with('employees', $employees)
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
        // Create new accountability form
        $af = new AccountabilityForm;
        $af->request_forms_id = $request->get('request_forms_id');
        $af->equipment_id = $request->get('equipment_id');
        $af->af_num = $request->get('af_num');
        $af->designation = $request->get('designation');
        $af->department = $request->get('department');
        $af->issued_date = Carbon::now();

        $af->employees_id = $request->get('employees_id');
        $af->admins_id = $request->get('admins_id');
        $af->save();

        // Decrease equipment by 1
        $af->equipment->update(['quantity' => $af->equipment->quantity - 1]);   
 
        return redirect()->route('accountability_forms.index')->with('success','Accountability Form Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfview(Request $request, $id)
    {

        $af = AccountabilityForm::findOrFail($id);




        // pass view file
        $pdf = PDF::loadView('partials.pdf.accountability_form', compact('af'))->setPaper('a4', 'portrait');

        // download pdf
        return $pdf->stream('acountability_form.pdf');
    }
}

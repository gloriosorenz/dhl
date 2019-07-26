<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountabilityForm;
use App\RequestForm;
use App\User;
use App\Equipment;
use App\Department;

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
        $for_approval = AccountabilityForm::where('form_statuses_id', 1);
        $approved = AccountabilityForm::where('form_statuses_id', 2);

        // dd($acc_forms);
        return view('accountability_forms.index')
            ->with('acc_forms', $acc_forms)
            ->with('for_approval', $for_approval)
            ->with('approved', $approved)
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
        $employees = User::orderBy('first_name')->get();
        $equipment = Equipment::where('equipment_statuses_id', 3)->get();
        $departments = Department::all();

        return view('accountability_forms.create')
            ->with('equipment', $equipment)
            ->with('employees', $employees)
            ->with('departments', $departments)
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
        $af_num = randomNumber();

        // Check duplicates
        $check = AccountabilityForm::pluck('af_num');

        foreach ($check as $num) {
            if($af_num == $num){
                
            }
        }
        // Create new accountability form
        $af = new AccountabilityForm;
        $af->request_forms_id = $request->get('request_forms_id');
        $af->equipment_id = $request->get('equipment_id');
        $af->af_num = $af_num;
        $af->designation = $request->get('designation');
        $af->issued_date = Carbon::parse($request->get('issued_date'));

        $af->departments_id = $request->get('departments_id');
        $af->employees_id = $request->get('employees_id');
        $af->admins_id = $request->get('admins_id');

        $af->form_statuses_id = 1; // for apporoval

        $af->save();

        // Updates equipment status
        $af->equipment->update(['equipment_statuses_id' => 2]);   // becomes requested

 
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
        $af = AccountabilityForm::findOrFail($id);
        

        return view('accountability_forms.show')
            ->with('af', $af);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $af = AccountabilityForm::findOrFail($id);
        $employees = User::orderBy('first_name')->get();
        $equipment = Equipment::where('quantity', '!=', 0)->get();
        $departments = Department::all();

        return view('accountability_forms.edit')
            ->with('af', $af)
            ->with('equipment', $equipment)
            ->with('employees', $employees)
            ->with('departments', $departments)
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
        
        // Create new accountability form
        $af = AccountabilityForm::findOrFail($id);
        $af->equipment_id = $request->get('equipment_id');
        $af->designation = $request->get('designation');
        $af->issued_date = Carbon::parse($request->get('issued_date'));

        $af->departments_id = $request->get('departments_id');
        $af->employees_id = $request->get('employees_id');
        $af->admins_id = $request->get('admins_id');

        $af->equipment->equipment_statuses_id = 1; // equipment becomes active
        $af->form_statuses_id = 2; // form becomes approved
        $af->save();
  

        return redirect()->route('accountability_forms.index')->with('success','Accountability Form Created ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $af = AccountabilityForm::findOrFail($id);

        // Increase equipment by 1
        // $af->equipment->update(['quantity' => $af->equipment->quantity + 1]);   

        $af->delete();
  
        return redirect()->route('accountability_forms.index')
                        ->with('success','Form Removed')
                        ;
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

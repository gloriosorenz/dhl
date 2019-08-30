<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MovementForm;
use App\AccountabilityForm;
use App\ReasonCode;
use App\User;

use Carbon\Carbon;

class MovementFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mov_forms = MovementForm::all();

        return view('movement_forms.index')
            ->with('mov_forms', $mov_forms)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $af = AccountabilityForm::findOrFail($id);
        $reason_code = ReasonCode::all();
        $employees = User::orderBy('first_name')->get();


        return view('movement_forms.create')
            ->with('af', $af)
            ->with('reason_code', $reason_code)
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
        $mf_num = randomNumber();

        // Check duplicates
        $check = MovementForm::pluck('mf_num');

        foreach ($check as $num) {
            if($mf_num == $num){
                
            }
        }
        // Create new movement form
        $mf = new MovementForm;
        $mf->mf_num = $mf_num;
        $mf->remarks = $request->get('remarks');
        $mf->accountability_forms_id = $request->get('accountability_forms_id');
        $mf->reason_codes_id = $request->get('reason_codes_id');
        $mf->employees_id = $request->get('employees_id');
        $mf->admins_id = $request->get('admins_id');
        $mf->form_statuses_id = 1; // for apporoval
        $mf->save();

        // Updates Accountability Form
        $af = AccountabilityForm::findOrFail($request->get('accountability_forms_id'));
        $af->form_statuses_id = 4; // transfered
        $af->save();


        // PT: Permanent Transfer or SU: Service Unit - Creates new Accountability form if it transfers to a new employee
        if($mf->reason_codes->id == 1 || $mf->reason_codes->id == 2){
            $new_af =  new AccountabilityForm;
            $new_af->equipment_id = $mf->accountability_forms->equipment->id;
            // $new_af->af_num = $af_num;
            $new_af->designation = $mf->employees->position;
            $new_af->issued_date = Carbon::now();

            $new_af->departments_id = $mf->employees->departments->id;
            $new_af->employees_id = $request->get('employees_id');
            $new_af->admins_id = $request->get('admins_id');

            $new_af->form_statuses_id = 1; // for apporoval

            $new_af->save();
        }

        // RE: Resigned or DS: For Disposal - the equipment status will now be available
        elseif($mf->reason_codes->id == 3 || $mf->reason_codes->id == 4){
            $af->equipment->equipment_statuses->id == 3;
        }
        


 
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


    // PDF Generation
    public function pdfview(Request $request, $id)
    {

        $af = AccountabilityForm::findOrFail($id);




        // pass view file
        $pdf = PDF::loadView('partials.pdf.accountability_form', compact('af'))->setPaper('a4', 'portrait');

        // download pdf
        return $pdf->stream('acountability_form.pdf');
    }
}

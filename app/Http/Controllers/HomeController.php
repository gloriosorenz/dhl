<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountabilityForm;
use App\MovementForm;
use App\Equipment;
use App\Inquiry;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mov_forms = MovementForm::paginate(10);

        // Shows all active equipment
        $acc_forms = AccountabilityForm::join('equipment', 'accountability_forms.equipment_id', '=', 'equipment.id')
            ->select('accountability_forms.*')
            ->where('form_statuses_id', 2)
            // ->where('equipment.equipment_statuses_id', 1)
            ->paginate(10)
            // ->get()
            ;

        // For approval
        $for_approval = AccountabilityForm::where('form_statuses_id', 1)->get();


        $inquiries = Inquiry::paginate(10);
        $questions = Question::paginate(10);


        // dd($acc_forms);
        
        return view('home')
        ->with('for_approval', $for_approval)
        ->with('mov_forms', $mov_forms)
        ->with('inquiries', $inquiries)
        ->with('questions', $questions)
        ;
    }
}

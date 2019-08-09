<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountabilityForm;
use App\MovementForm;

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
            ->where('equipment.equipment_statuses_id', 1)
            // ->where('employees_id', $user->id)
            ->paginate(10)
            // ->get()
            ;

        // dd($acc_forms);
        
        return view('home')
        ->with('acc_forms', $acc_forms)
        ->with('mov_forms', $mov_forms)
        ;
    }
}

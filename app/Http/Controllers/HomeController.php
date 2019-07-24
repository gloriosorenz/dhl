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
        $acc_forms = AccountabilityForm::paginate(10);
        $mov_forms = MovementForm::paginate(10);

        // dd($acc_forms);
        
        return view('home')
        ->with('acc_forms', $acc_forms)
        ->with('mov_forms', $mov_forms)
        ;
    }
}

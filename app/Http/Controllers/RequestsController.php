<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipment;
use App\RequestForm;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestForm::all();

        if($requests) {
            return view('requests.index')
            ->with('requests', $requests)
            ->with('error', 'There are no requests');
        } else {
            return redirect('/home')->with('errors', 'Error');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = Equipment::where('quantity', '!=', 0)->get();

        return view('requests.create')
            ->with('equipment', $equipment);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check for duplicates
        $requests = RequestForm::all();
        foreach($requests as $r){
            if($request->get('users_id') == $r->users_id && $request->get('equipment_id') == $r->equipment_id){
                return redirect()->route('requests.create')->with('error', 'You already requested for this equipment');
            }
        }

        // Create new request form
        $request_form = new RequestForm;
        $request_form->equipment_id = $request->get('equipment_id');
        $request_form->users_id = $request->get('users_id');
        $request_form->save();

        // Decrease equipment by 1
        $request_form->equipment->update(['quantity' => $request_form->equipment->quantity - 1]);    


        return redirect()->route('requests.create')->with('success','Request Created ');
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
        $request_form = RequestForm::findOrFail($id);
        $request_form->equipment->update(['quantity' => $request_form->equipment->quantity + 1]);    

        $request_form->delete();
  
        return redirect()->route('requests.index')
                        ->with('success','Request Cancelled');
    }
}

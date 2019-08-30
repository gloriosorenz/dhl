<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inquiry;
use Carbon\Carbon;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = Inquiry::all();
        $user_inquiries = Inquiry::where('employees_id', auth()->user()->id)->get();

        return view('inquiries.index')
            ->with('inquiries', $inquiries)
            ->with('user_inquiries', $user_inquiries)
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiries.create');
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
            'subject' => 'required|string|max:255',
            'inquiry' => 'required|string|max:255',
            // 'narrative' => 'required|string|max:255',
        ]);

        $inquiry = new Inquiry;
        $inquiry->subject = $request->get('subject');
        $inquiry->inquiry = $request->get('inquiry');
        $inquiry->date_inquired = Carbon::now();

        $inquiry->inquiry_statuses_id = 1; // Pending
        $inquiry->employees_id = auth()->user()->id;
        // $inquiry->admins_id = $request->get('admins_id');
        $inquiry->save();

        return redirect()->back()->with('success','Inquiry Submitted ');
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

    public function complete($id){
        
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->inquiry_statuses_id = 2; // form becomes completed
        $inquiry->save();

        // Updates equipment status
        // $af->equipment->update(['equipment_statuses_id' => 1]);   // becomes active

        return redirect()->back()->with('success', 'Inquiry Approved');
    }
}

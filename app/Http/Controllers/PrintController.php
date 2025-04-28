<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {  
        $sessionData = Session::all();
        dd($sessionData);
        // Retrieve session data using the Session facade
        $name = Session::get('name');
        $father_name = Session::get('father_name');
        $roll_number = Session::get('roll_number');
        $class = Session::get('class');
        $session = Session::get('session');
        $year = Session::get('year');
        $application = Session::get('application');
        $Application = Session::get('Application');
        $doc_paper_custom_amount = Session::get('doc_paper_custom_amount');
        $fee = Session::get('fee');
        $feeInWords = Session::get('feeInWords');
    
        // Use the retrieved session data
        // return view('your.view', compact('name', 'father_name', 'roll_number', 'class', 'session', 'year', 'application', 'Application', 'doc_paper_custom_amount', 'fee', 'feeInWords'));
     


        // resources\views\layouts\Printable\receipt-and-application.blade.php    }
        // return redirect()->route('applicationFilling.render');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

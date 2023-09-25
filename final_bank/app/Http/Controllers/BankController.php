<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::all();

        return view('banks.index', [
            'banks' => $banks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banks.create')->with('msg', ['type' => 'success', 'content' => 'Account was created successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bank = new Bank;

        $bank->account_date = $request->date;
        $bank->client_firstname = $request->first_name;
        $bank->client_lastname = $request->last_name;
        $bank->client_code = $request->personal_code;
        $bank->bank_amount = $request->bank_amount;

        $bank->save();

        return redirect()->route('banks-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('banks.edit', [
            'bank' => $bank,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $bank->account_date = $request->date;
        $bank->client_firstname = $request->first_name;
        $bank->client_lastname = $request->last_name;
        $bank->client_code = $request->personal_code;
        $bank->bank_amount = $request->bank_amount;

        $bank->save();

        return redirect()->route('banks-index')
            ->with('msg', ['type' => 'success', 'content' => 'Account was updated successfully.']);
    }

    public function delete(Bank $bank)
    {
        return view('banks.delete', [
            'bank' => $bank,
            'accCount' => $bank->accounts()->count(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete(); // delete the object from the database

        return redirect()
            ->route('banks-index')
            ->with('msg', ['type' => 'info', 'content' => 'Account was deleted successfully.']);
        // redirect to the index page with a info message
    }
}

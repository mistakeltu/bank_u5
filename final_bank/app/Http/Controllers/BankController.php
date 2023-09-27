<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $banks = Bank::orderBy('client_lastname')->paginate(15);

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
        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required|date',
                'first_name' => 'required|min:3|max:255',
                'last_name' => 'required|min:3|max:255',
                'personal_code' => 'required|min:11|max:11',
            ],
            [
                'date.required' => 'Creating day is required.',
                'first_name.min' => 'First name must be at least 3 characters.',
                'last_name.max' => 'Last name must be less than 255 characters.',
                'personal_code.min' => 'Personal code must be 11 numbers.',
                'personal_code.max' => 'Personal code must be 11 numbers.',
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'personal_code.numeric' => 'Personal code must be a number.',
                'personal_code.required' => 'Personal code is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('banks-create')
                ->withErrors($validator)
                ->withInput();
        }



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

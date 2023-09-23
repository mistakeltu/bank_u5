<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bank;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create', [
            'banks' => Bank::all()
        ])->with('msg', ['type' => 'success', 'content' => 'Account was created successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account = new Account;

        $account->account_number = $request->account_number;
        $account->account_amount = 0;
        $account->bank_id = $request->bank_id;

        $account->save();

        return redirect()->route('accounts-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', [
            'account' => $account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $account->account_number = $request->account_number;
        $account->account_amount += $request->add_amount;
        $account->account_amount -= $request->sub_amount;
        // $account->bank_id = $request->bank_id;

        $account->save();

        return redirect()->route('accounts-index')
            ->with('msg', ['type' => 'success', 'content' => 'Account was updated successfully.']);
    }

    public function delete(Account $account)
    {
        return view('accounts.delete', [
            'account' => $account,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete(); // delete the object from the database

        return redirect()
            ->route('accounts-index')
            ->with('msg', ['type' => 'info', 'content' => 'Account number was deleted successfully.']);
        // redirect to the index page with a info message
    }
}

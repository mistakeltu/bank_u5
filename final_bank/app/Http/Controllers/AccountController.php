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
        $accounts = Account::orderBy('account_amount', 'DESC')->paginate(15);

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

        $account->account_number = 'LT' . rand(100000000000000000, 999999999999999999);
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
        return view('accounts.show', [
            'account' => $account,
        ]);
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
        $addAmount = $request->add_amount;
        $subAmount = $request->sub_amount;

        if ($account->account_amount - $subAmount >= 0) {
            $account->account_amount += $addAmount;
            $account->account_amount -= $subAmount;

            $account->save();

            return redirect()->route('accounts-index')
                ->with('msg', ['type' => 'success', 'content' => 'Account was updated successfully.']);
        } else {

            return redirect()->route('accounts-index')
                ->with('msg', ['type' => 'danger', 'content' => 'Account cant be negative.']);
        }
    }

    public function delete(Account $account)
    {
        return view('accounts.delete', [
            'account' => $account,
            'accAmount' => $account->account_amount,
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

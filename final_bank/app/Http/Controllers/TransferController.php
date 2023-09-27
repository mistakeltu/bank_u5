<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all transfer records with related source and target account information
        // $transfers = Transfer::with(['sourceAccount.bank', 'targetAccount.bank'])->get();
        // $transfers = Account::all();
        $transfers = Bank::all();
        $accounts = Account::with('bank')->get();

        return view('transfers.index', [
            'transfers' => $transfers,
            'accounts' => $accounts

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve the list of banks/clients for the dropdown
        // $banks = Bank::with('accounts')->get();
        $accounts = Account::with('bank')->get();

        return view('transfers.create', [
            'accounts' => $accounts,
        ]);

        // return view('transfers.create', [
        //     'banks' => $banks,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'source_account_id' => 'required|exists:banks,id',
            'target_account_id' => 'required|exists:banks,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        // Get the source and target accounts based on bank IDs
        $sourceAccount = Account::where('id', $request->input('source_account_id'))->first();
        $targetAccount = Account::where('id', $request->input('target_account_id'))->first();

        dump($sourceAccount);
        // die;

        // Check if source and target accounts exist
        if (!$sourceAccount || !$targetAccount) {
            return back()->withErrors(['message' => 'Invalid source or target bank IDs.']);
        }

        // Check if the source account has sufficient balance
        if ($sourceAccount->account_amount < $request->input('amount')) {
            return back()->withErrors(['message' => 'Insufficient balance in the source account.']);
        }

        // Perform the transfer within a database transaction
        DB::beginTransaction();

        // Deduct the amount from the source account
        $sourceAccount->decrement('account_amount', $request->input('amount'));

        // Add the amount to the target account
        $targetAccount->increment('account_amount', $request->input('amount'));

        // Commit the transaction
        DB::commit();

        return redirect()->route('home')->with('success', 'Money transferred successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BankController as B;
use App\Models\Bank;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) {
            $userAccounts = Account::with('bank')->get();
            $bank = Bank::with('accounts')->get();

            $clients = Bank::with('accounts')->get();

            // Calculate the total number of accounts for all clients
            $totalAccounts = $clients->sum(function ($client) {
                return optional($client->accounts)->count() ?? 0;
            });

            // Count how many bank accounts have zero money
            $zeroBalanceAccountsCount = $userAccounts->filter(function ($userAccount) {
                return $userAccount->account_amount == 0; // Adjust the column name as per your database structure
            })->count();

            // Calculate the sum of all account amounts
            $totalAccountAmount = $userAccounts->sum('account_amount'); // Adjust the column name as per your database structure

            // Find the biggest amount of money in an account
            $biggestAmount = $userAccounts->max('account_amount'); // Adjust the column name as per your database structure

            // Calculate the average amount of money across all accounts
            $averageAmount = $userAccounts->avg('account_amount'); // Adjust the column name as per your database structure

            // Find negative amount accounts
            $negativeAccounts = $userAccounts->filter(function ($userAccount) {
                return $userAccount->account_amount < 0; // Adjust the column name as per your database structure
            });

            // Check if there are any user accounts associated with the authenticated user.
            if ($userAccounts->isNotEmpty() || $bank->isNotEmpty()) {
                return view('layouts.home', compact('bank', 'userAccounts', 'totalAccounts', 'zeroBalanceAccountsCount', 'totalAccountAmount', 'biggestAmount', 'averageAmount', 'negativeAccounts'));
            }


            // Handle the case where there are no user accounts.
            return view('layouts.home', ['message' => 'No bank account information available.']);
        }

        // Handle the case where the user is not authenticated.
        return redirect()->route('login');
    }
}

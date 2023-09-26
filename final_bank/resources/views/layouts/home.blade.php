@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ($bank->isNotEmpty())
                        <p>Total User Bank Accounts: {{ $userAccounts->count() }}</p>
                        <p>Total Bank Accounts: {{ $totalAccounts }}</p>
                        <p>Bank Accounts with Zero Money: {{ $zeroBalanceAccountsCount }}</p>
                        <p>Total Account Amount: {{ $totalAccountAmount }}</p>
                        <p>Biggest Amount in an Account: {{ $biggestAmount }}</p>
                        <p>Average Amount Across All Accounts: {{ $averageAmount }}</p>
                        <p>Average Amount Across All Accounts: {{ $negativeAccounts ? 'No accounts with negative amount of money' : '' }}</p>
                        @foreach ($bank as $bankItem)
                            <h4>{{ $bankItem->client_firstname }}</h4>

                            @if ($bankItem->accounts->isNotEmpty())
                                <b>Bank Accounts:</b>
                                <ul>
                                    @foreach ($bankItem->accounts as $account)
                                        <li>Account Number: {{ $account->account_number }}</li>
                                        <li>Account money: {{ $account->account_amount }} eur</li>
                                        <!-- You can display other account information here as needed -->
                                    @endforeach
                                </ul>
                            @else
                                <p>No accounts associated with this client.</p>
                            @endif
                        @endforeach
                    @else
                        <p>{{ $message }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




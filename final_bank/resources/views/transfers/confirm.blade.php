<!-- resources/views/transfers/confirm.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Transfer') }}</div>
                <div class="card-body">
                    <p>You are about to transfer {{ $amount }} EUR from the account:</p>
                    <p>Source Account: {{ $sourceAccount->account_number }} | {{ $sourceAccount->bank->client_firstname }}</p>
                    <p>To the account:</p>
                    <p>Target Account: {{ $targetAccount->account_number }} | {{ $targetAccount->bank->client_firstname }}</p>
                    <p>Amount: {{ $amount }} EUR</p>
                    
                    <form method="POST" action="{{ route('transfers-confirm') }}">
                        @csrf
                        <input type="hidden" name="source_account_id" value="{{ $sourceAccount->id }}">
                        <input type="hidden" name="target_account_id" value="{{ $targetAccount->id }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        
                        <button type="submit" class="btn btn-primary">Transfer Money</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






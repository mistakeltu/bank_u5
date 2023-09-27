@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Money Transfer') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('transfers-store') }}">
                        @csrf

                        <!-- Select Source Bank -->
                        <div class="mb-3">
                            <label for="source_account_id">Select Source Bank</label>
                            <select class="form-select" name="source_account_id" id="source_account_id">
                                <option selected value="">Select Source Bank</option>
                                @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{$account->bank->client_firstname}} | {{ $account->account_number }} | {{ $account->account_amount }} eur</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Select Target Bank -->
                        <div class="mb-3">
                            <label for="target_account_id">Select Target Bank</label>
                            <select class="form-select" name="target_account_id" id="target_account_id">
                                <option selected value="">Select Target Bank</option>
                                @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{$account->bank->client_firstname}} | {{ $account->account_number }} | {{ $account->account_amount }} eur</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Amount Input -->
                        <div class="mb-3">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Transfer Money</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

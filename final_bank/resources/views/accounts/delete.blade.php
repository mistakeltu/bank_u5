{{-- DELETE INVOICE CONFIRMATION --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Confirm Delete Bank Account Number</h1>
                </div>
                <div class="card-body">
                    <form action={{route('accounts-destroy', $bank)}} method="post">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="m-3">
                                        <h4>Bank account number</h4>
                                        <p>{{$account->account_number}}</p>
                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-outline-danger m-1">Delete</button>
                                        <a href="{{route('accounts-index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
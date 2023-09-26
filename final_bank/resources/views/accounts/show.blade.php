@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>Account information</h1>
                </div>
                <div class="card-body">
                    <form action={{route('accounts-show', $account)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Account number</label>
                                        <div class="card">
                                            <div class="card-body">
                                                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                {{$account->account_number}}
                                                @else
                                                <p style="color: red">You dont have permission.</p>
                                                @endif
                                            </div>
                                          </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Account amount</label>
                                        <div class="card">
                                            <div class="card-body">
                                                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                {{$account->account_amount}}
                                                @else
                                                <p style="color: red">You dont have permission.</p>
                                                @endif
                                            </div>
                                          </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Account client first name</label>
                                        <div class="card">
                                            <div class="card-body">
                                                {{$account->bank->client_firstname}}
                                            </div>
                                          </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Account client second name</label>
                                        <div class="card">
                                            <div class="card-body">
                                                {{$account->bank->client_lastname}}
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <a href="{{route('accounts-index')}}" type="submit" class="btn btn-outline-secondary">Accounts list</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('PUT')
                    </form>    
            </div>
        </div>
    </div>
</div>
@endsection
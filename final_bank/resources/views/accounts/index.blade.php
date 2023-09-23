@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h1>Bank Accounts list</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Client name</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Account number</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Account amount</h4>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </li>

                        @foreach ($accounts as $account)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    {{$account->bank->client_firstname}}
                                </div>
                                <div class="col-md-3">
                                    {{$account->account_number}}
                                </div>
                                <div class="col-md-3">
                                    {{$account->account_amount}}
                                </div>
                                <div class="col-md-3">
                                    <div class="buttons-bin">
                                        <a href="{{route('accounts-show', $account->id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('accounts-edit', $account->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('accounts-delete', $account->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
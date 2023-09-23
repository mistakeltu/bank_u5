@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>Edit account information</h1>
                </div>
                <div class="card-body">
                    <form action={{route('accounts-update', $account)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Account number</label>
                                        <input type="text" class="form-control" placeholder="Account number" name="account_number" value ={{$account->account_number}}>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Add money to Account</label>
                                        <input type="text" class="form-control" placeholder="Add money" name="add_amount">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Subtract money from Account</label>
                                        <input type="text" class="form-control" placeholder="Subtract money" name="sub_amount">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Edit Account</button>
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
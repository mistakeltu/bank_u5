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
                    <form action={{route('banks-update', $bank)}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="bank account date" name="date" value ={{$bank->account_date}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client first name</label>
                                        <input type="text" class="form-control" placeholder="Client first name" name="first_name" value ={{$bank->client_firstname}}>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client last name</label>
                                        <input type="text" class="form-control" placeholder="Client last name" name="last_name" value ={{$bank->client_lastname}}>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client personal code</label>
                                        <input type="number" class="form-control" placeholder="Client personal code" name="personal_code" value ={{$bank->client_code}}>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client bank amount</label>
                                        <input type="number" class="form-control" placeholder="Client personal code" name="bank_amount" value ={{$bank->bank_amount}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Edit Account</button>
                                        <a href="{{route('banks-index')}}" type="submit" class="btn btn-outline-secondary">Clients list</a>
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
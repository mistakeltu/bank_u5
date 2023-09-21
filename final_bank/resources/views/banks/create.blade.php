@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>Create new bank account</h1>
                </div>
                <div class="card-body">
                    <form action={{route('banks-store')}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Bank account number</label>
                                        <input type="text" class="form-control" placeholder="Bank account number"
                                            name="number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="bank account date" name="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client first name</label>
                                        <input type="text" class="form-control" placeholder="Client first name" name="firstName">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client last name</label>
                                        <input type="text" class="form-control" placeholder="Client last name" name="lastName">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client personal code</label>
                                        <input type="number" class="form-control" placeholder="Client personal code" name="personal_code">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <input type="text" class="--amount form-control" readonly
                                                        value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Create Invoice</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>    
            </div>
        </div>
    </div>
</div>
@endsection
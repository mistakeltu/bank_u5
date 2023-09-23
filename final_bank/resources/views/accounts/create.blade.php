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
                    <form action={{route('accounts-store')}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Select Client</label>
                                        <select class="form-select" name="bank_id">
                                            <option selected value="">Select Client</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->client_firstname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Add bank account to client</button>
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h1>Create new bank client</h1>
                </div>
                <div class="card-body">
                    <form action={{route('banks-store')}} method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" placeholder="bank account date" name="date" value="{{old('date')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client first name</label>
                                        <input type="text" class="form-control" placeholder="Client first name" name="first_name" value="{{old('first_name')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client last name</label>
                                        <input type="text" class="form-control" placeholder="Client last name" name="last_name" value="{{old('last_name')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Client personal code</label>
                                        <input type="number" class="form-control" placeholder="Client personal code" name="personal_code" value="{{old('personal_code')}}">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label">Client bank amount</label>
                                        <input type="number" class="form-control" placeholder="Client personal code" name="bank_amount">
                                    </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-outline-primary">Create Account</button>
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
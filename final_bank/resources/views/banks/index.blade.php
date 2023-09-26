@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h1>Accounts list</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>Account Date</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Client first name</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Client last name</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Client personal code</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Bank Accounts</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Actions</h4>
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </li>

                        @foreach ($banks as $bank)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-2">
                                    {{$bank->account_date}}
                                </div>
                                <div class="col-md-2">
                                    {{$bank->client_firstname}}
                                </div>
                                <div class="col-md-2">
                                    {{$bank->client_lastname}}
                                </div>
                                <div class="col-md-2">
                                    {{$bank->client_code}}
                                </div>
                                {{-- <div class="col-md-2">
                                    <b>{{$bank->account->account_amount}} eur</b>
                                </div> --}}
                                <div class="col-md-2">
                                    <b>{{$bank->accounts()->count()}} </b>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="buttons-bin">
                                        {{-- <a href="{{route('banks-show', $bank->id)}}" class="btn btn-primary">Show</a> --}}
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                        <a href="{{route('banks-edit', $bank->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('banks-delete', $bank->id)}}" class="btn btn-danger">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                      </ul>
                </div>
                {{$banks->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
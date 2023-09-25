{{-- DELETE INVOICE CONFIRMATION --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Confirm Delete Client</h1>
                </div>
                @if(!$accCount)
                <div class="card-body">
                    <form action={{route('banks-destroy', $bank)}} method="post">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="m-3">
                                        <h4>Client name</h4>
                                        <p>{{$bank->client_firstname}}</p>
                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-outline-danger m-1">Delete</button>
                                        <a href="{{route('banks-index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @else
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="m-3">
                                    <h4><p>{{$bank->client_firstname}}</h4>
                                </div>
                                <div class="m-3 text-danger">
                                    <div>Client has accounts</div>
                                        <div>Client cannot be deleted</div>
                                </div>
                                <div class="m-3">
                                    <a href="{{route('banks-index')}}" class="btn btn-outline-secondary m-1">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
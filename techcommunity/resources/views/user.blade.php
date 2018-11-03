@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in as user! Place five comments to get access to place posts. </p>
                    <a class="btn btn-primary" href="editprofile" role="button">Click here to change your credentials!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

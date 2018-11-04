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

                   <p> You are logged in admin!</p>
                    <a class="btn btn-primary" href="posts/create" role="button">Click here to create a post!</a>
                    <a class="btn btn-primary" href="getposts" role="button">View all your posts!</a>

                    @if(count($users) >= 1)

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>
                                            <form action="admin/{{ $user->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-link">Delete User</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                             </tbody>
                        </table>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
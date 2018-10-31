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

                    You are logged in admin!<br>
                    <a class="btn btn-primary" href="posts/create" role="button">Click here to create a post!</a>

                    @if(count($posts) >= 1)

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Published</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($posts as $post)

                                    <tr>
                                        <td><a href="posts/{{$post->id}}">{{$post->title}}</a></td>
                                        <td>{{$post->categorie}}</td>
                                        <td>{{$post->created_at_date}}</td>
                                        <td>{{$post->active}}</td>
                                        <td><a href="">Update</a></td>
                                        <td>
                                            <form action="posts/{{ $post->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-link">Delete Post</button>
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

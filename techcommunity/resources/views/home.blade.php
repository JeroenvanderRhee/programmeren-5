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

                   <p> You are logged in author!</p>
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
                                        <td class="toggle">

                                            <form method="POST" action="http://localhost/programmeren-5/techcommunity/public/active">
                                                {{ csrf_field() }}

                                               <!--  <input type="checkbox" name="state_post" value="1"onChange="this.form.submit()"/> -->
                                            
                                                @if($post['active'] == 1)
                                           
                                                    <input type="checkbox" name="state_post" value = "0" id="active_0{{$post->id}}" onChange="this.form.submit()"/>
                                                    <label class="off" for="active_0{{$post->id}}">0</label>
                                                    <label class="on on-on" for="active_0{{$post->id}}">1</label>  

                                                    <!-- <input type="checkbox" name="state_post" value = "1" id="active_1" checked/>
                                                    <label class="form-check-label" for="active_1">1</label> -->
                                                @else

                                                    <!-- <input type="checkbox" name="state_post" value = "0" id="active_0" checked/>
                                                    <label class="form-check-label" for="active_0">0</label>

                                                    <input type="checkbox" name="state_post" value = "1" id="active_1" onChange="this.form.submit()"/>
                                                    <label class="form-check-label" for="active_1">1</label> -->

                                                    <input type="checkbox" name="state_post" value = "1" id="active_1{{$post->id}}" onChange="this.form.submit()"/>
                                                    <label class="off off-off" for="active_1{{$post->id}}">0</label>
                                                     <label class="on" for="active_1{{$post->id}}">1</label>
                                                @endif
                                                <input type="hidden" name="id" value = "{{$post->id}}"/>
                                            </form>
                                        </td>

                                        <td><a class="btn btn-link" href="posts/{{$post->id}}/edit">Edit Post</a></td>
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

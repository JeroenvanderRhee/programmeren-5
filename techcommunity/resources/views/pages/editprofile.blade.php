 @extends('layouts.app')


@section('content')
@auth
<h1>Update page</h1>
  @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
<p>
	After changing your credentials, you will logout!
</p>
<form method="POST" action="http://localhost/programmeren-5/techcommunity/public/updateprofile">
		@csrf
		<div class="form-group">
			<label>Name:</label>
			<input class="form-control" type="text" name="name" value="{{auth()->user()->name}}"/>
		</div>
		
		<div class="form-group">
			<label>Email:</label>
			<input class="form-control" type="email" name="email" value="{{ auth()->user()->email}}"/>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Update</button>
		</div>
	</div>
</form>
@endauth
@guest
<div class="alert alert-danger" role="alert">
  Access denied!
</div>
@endguest
@endsection
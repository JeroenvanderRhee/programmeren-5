@extends('layouts.app')

@section('content')
<form method="get" action="http://localhost/programmeren-5/techcommunity/public/searching">
	<div class="form-group">
		<input class="form-control" type="text" name="search" placeholder="Search..."/><br>
		<button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>

@endsection


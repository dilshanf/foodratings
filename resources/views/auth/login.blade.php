@extends('layouts.main')

@section('content')
		<form method="POST" action="{{ route('auth') }}">
		@csrf        
			<div>
				<input name="email" type="email" placeholder="Email address" required="required">
			</div>
			<div>
				<input name="password" type="password" placeholder="Password" required="required">
			</div>
			<button type="submit">Log In</button>
				
		</form>
@endsection
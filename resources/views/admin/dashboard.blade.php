@extends('layouts.main')

@section('content')

		<h3>Authorities</h3>
		<ul>
		@foreach ($authorities as $authority)
			<li> {{ $authority['name'] }} 
				<a href="/establishments/{{ $authority['id'] }}">View Esablishments</a>
		</li>
		@endforeach
		</ul>

@endsection
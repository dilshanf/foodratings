@extends('layouts.main')

@section('content')
		
		<a href="/">Go Back</a>

		<h3>Establishments</h3>
		<table>
			<thead>
				<th>ID</th>
				<th>Rating</th>
				<th>Rating Date</th>
			</thead>
		
			<tbody>
		@foreach ($establishments as $establishment)
		<tr>
			<td> {{ $establishment['id'] }}</td>
			<td> {{ $establishment['rating'] }} </td>
			<td> {{ $establishment['rating_date'] }} </td>
		</tr>
		@endforeach
			</tbody>
		</table>


@endsection
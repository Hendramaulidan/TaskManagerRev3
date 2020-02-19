@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<table class="table table-striped table-light table-borderless table-hover">
		<thead class="thead-dark text-center">
			<tr>
				<th>Number</th>
				<th>Task Name</th>
				<th>My Activity</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>	
		<tbody>
			<?php $i = 1;  ?>
		@foreach($history as $histo)
			
			<tr class="table-light text-center">
				<th class="alert alert-danger"> {{$i++}}</th>
						<td >{{$histo->name_task}}</td>
						<td>{{$histo->kegiatan}}</td>		
						<td class="alert alert-primary">{{$histo->created_at}}</td>
						<td><a href="/home/history/{{$histo->id}}"class="text-danger"><i class="fas fa-trash"></i></a></td>
			</tr>
			@endforeach
			
		</tbody>
			
	</table>
</div>
@endsection

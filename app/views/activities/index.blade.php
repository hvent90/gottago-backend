@extends('layouts.default')

@section('content')
{{ link_to_route('activities.create', 'Add a Activity', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($activities as $activity)
		<tr>
			<td>
				<li>{{ $activity->name }}</li>
				@if ($activity->description != '')
				<li>{{ $activity->description }}</li>
				@endif
			</td>
			<td>
				<li>{{ House::find($activity->house_id)->name }}</li>
				<li>{{ Tenant::find($activity->tenant_id)->first_name }}</li>
			</td>
			<td>
				{{ link_to_route('activities.edit',    'Edit',   $activity->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('activities.destroy', 'Delete', $activity->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
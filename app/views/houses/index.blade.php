@extends('layouts.default')

@section('content')
{{ link_to_route('houses.create', 'Add a House', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($houses as $house)
		<tr>
			<td>
				<li>{{ $house->name }}</li>
				@if ($house->address != '')
				<li>{{ $house->address }}</li>
				@endif
				@if ($house->bio != '')
				<li>{{ $house->bio }}</li>
				@endif
				@foreach ($tenants as $tenant)
					{{ link_to_route('houses.connect', $tenant->first_name, ['houseId' => $house->id, 'tenantId' => $tenant->id], ['class' => 'btn btn-info'])}}
				@endforeach
				<br />
				@foreach ($tenants as $tenant)
					{{ link_to_route('houses.disconnect', $tenant->first_name, ['houseId' => $house->id, 'tenantId' => $tenant->id], ['class' => 'btn btn-danger'])}}
				@endforeach
			</td>
			<td>
				{{ link_to_route('houses.edit',    'Edit',   $house->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('houses.destroy', 'Delete', $house->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
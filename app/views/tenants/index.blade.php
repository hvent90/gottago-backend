@extends('layouts.default')

@section('content')
{{ link_to_route('tenants.create', 'Add a Tenant', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($tenants as $tenant)
		<tr>
			<td>
				<li>{{ $tenant->first_name }} {{ $tenant->last_name }}</li>
				<li>{{ $tenant->nickname }}</li>
				<li>{{ $tenant->email }}</li>
			</td>
			<td>
				{{ link_to_route('tenants.edit',    'Edit',   $tenant->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('tenants.destroy', 'Delete', $tenant->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
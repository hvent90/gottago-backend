@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>Register!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'tenants.store', 'method' => 'post']) }}
			<!-- First Name Form Input -->
			<div class="form-group">
				{{ Form::label('first_name', 'First Name:') }}
				{{ Form::text('first_name', null, ['class' => 'form-control']) }}
			</div>

			<!-- Last Name Form Input -->
			<div class="form-group">
				{{ Form::label('last_name', 'Last Name:') }}
				{{ Form::text('last_name', null, ['class' => 'form-control']) }}
			</div>

			<!-- Nickname Form Input -->
			<div class="form-group">
				{{ Form::label('nickname', 'Nickname:') }}
				{{ Form::text('nickname', null, ['class' => 'form-control']) }}
			</div>

			<!-- Email Form Input -->
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>

			<!-- Password Form Input -->
			<div class="form-group">
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>

			<!-- Password Confirmation Form Input -->
			<div class="form-group">
				{{ Form::label('password_confirmation', 'Confirm Password:') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Sign Up', ['class' => 'btn btn-primary'])}}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop


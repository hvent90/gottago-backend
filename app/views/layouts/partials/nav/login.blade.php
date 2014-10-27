{{ Form::open(['route' => 'tenants.login']) }}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'placeholer' => 'Email Address']) }}
        {{ $errors->first('email', '<p class="help-block">:message</p>') }}
    </div>

    <!-- Password Confirmation Form Input -->
        {{ Form::label('password', 'Password') }}
    <div class="input-group">
        {{ Form::password('password', ['class' => 'form-control']) }}
        <span class="input-group-btn nav-login-submit">
            {{ Form::submit('Go!', ['class' => 'btn btn-primary'])}}
        </span>
    </div>

{{ Form::close() }}
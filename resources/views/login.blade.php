

{!! Form::open(array('url' => 'auth/login', 'method' => 'POST')) !!}

{!! Form::label('email')!!}
{!! Form::email('email')!!}<br>
{!! Form::label('password', 'Password')!!}
{!! Form::password('password')!!}<br>
{!! Form::submit('Login!')!!}
{!! Form::close() !!}
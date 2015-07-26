<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign-Up: A Laravel Form</title>

    </head>

    <body>
        <h1>Newsletter sign up</h1>

        <!--  <form action="{{URL::to('save?_token='.csrf_token())}}" method="POST">
  
              <input type="text" name="name" id="name">
              <br>
              <input type="email" name="email" id="email">
              <br>
              <input type="password" name="psw" id="psw">
              <br>
              <input type="submit" value="Pievienot">
          </form> -->
        {!! Form::open(array('url' => 'save', 'method' => 'POST')) !!}
        {!! Form::label('name')!!}
        {!! Form::text('name')!!}<br>
        {!! Form::label('email')!!}
        {!! Form::email('email')!!}<br>
        {!! Form::label('psw', 'Password')!!}
        {!! Form::password('psw')!!}<br>
        {!! Form::submit('Save!')!!}
        {!! Form::close() !!}
    </body>
</html>
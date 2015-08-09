@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <h1>Jautājumi un atbildes</h1>
    <br>
    @foreach( $questions as $question )
    <div id="par_div">
        <div>
            <div><a href="{{url("question/$question->title/$question->id")}}">{{$question->title}}</a></div>
            <div>{{$question->created_at}}</div>
        </div>
        <hr>
    </div>
    @endforeach


    <div class='input-form'>
        {!! Form::open(array('url' => 'question/store', 'method' => 'POST')) !!}
        {!! Form::text('name', '', array('class'=>'form-control', 
        'size'=>'256',
        'placeholder'=>'Virsraksts'))!!}<br>
        {!! Form::textarea('question', '', array('class'=>'form-control',
        'placeholder'=>'Jautājums')) !!}<br>
        {!! Form::email('email', '', array('class'=>'form-control',
        'placeholder'=>'E-pasts'))!!}<br>            
        {!! Form::submit('Pievienot jautājumu!', array('class'=>'btn btn-default'))!!}
        {!! Form::close() !!}
    </div>
</div>
</div>
@stop

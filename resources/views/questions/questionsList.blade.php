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
            @if (Auth::check())
            <?php
            $class = "btn-success";
            $statusLbl = "Redzams";
            if ($question->status == '0001') {
                $class = "btn-warning";
                $statusLbl = "Neredzmas";
            }
            ?>
            <div class="btn-group question-list-status">
                <button type="button" class="btn dropdown-toggle {{ $class }} status_{{$question->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$statusLbl}} <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a onclick="QUESTIONS.QUESTION.setStatus('0001', {{$question->id}})">Neredzams</a></li>
                    <li><a onclick="QUESTIONS.QUESTION.setStatus('0002', {{$question->id}})">Redzams</a></li>
                </ul>
            </div>
            @endif
        </div>
        <hr>
    </div>
    @endforeach
    <h4>Uzdot jautājumu</h4>
    <div class='input-form'>
        {!! Form::open(array('url' => 'question/store', 'method' => 'POST')) !!}
        {!! Form::text('name', '', array('class'=>'form-control', 
        'size'=>'256',
        'placeholder'=>'Virsraksts'))!!}<br>
        {!! Form::textarea('question', '', array('class'=>'form-control',
        'placeholder'=>'Jautājums')) !!}<br>
        {!! Form::email('email', '', array('class'=>'form-control',
        'placeholder'=>'E-pasts'))!!}<br>            
        {!! Form::submit('Pievienot jautājumu!', array('class'=>'btn btn-default' 'type' => 'button'))!!}
        {!! Form::close() !!}
    </div>
</div>
@stop

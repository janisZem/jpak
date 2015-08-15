@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <div class="question-edit-controls">
        @if (Auth::check())
        <?php
        $class = "btn-success";
        $statusLbl = "Redzams";
        if ($question->status == '0001') {
            $class = "btn-warning";
            $statusLbl = "Neredzmas";
        }
        $state = "btn-success";
        if ($question['question_classif'][0]->code == '0001') {
            $state = "btn-warning";
        }
        ?>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle {{ $class }} question-status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$statusLbl}} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a onclick="QUESTIONS.QUESTION.setStatus('0001')">Neredzams</a></li>
                <li><a onclick="QUESTIONS.QUESTION.setStatus('0002')">Redzams</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle {{ $state }} question-state" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$question['question_classif'][0]->value}} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a onclick="QUESTIONS.QUESTION.setState('0002')">Apstiprināts</a></li>
                <li><a onclick="QUESTIONS.QUESTION.setState('0001')">Iesniegts</a></li>
            </ul>
        </div>
        @endif
    </div>
    <div id="par_div">
        <div class="question-title-div">
            <div><h4 class="question-title">{{$question->title}}</h4> {{$question->created_at}}</div>
            <hr>
            <div class="question-content">{{$question->question}}</div>
            <span class="question-id">{{$question->id}}</span>
        </div>
    </div>
    <br>
    <hr>
   
    @foreach($answers as $answer)
    <div id="par_div">
        <div class="question-title-div">
            <div class="question-content">{{$answer->answer}}</div>
        </div>
    </div>
    @endforech

    <h4>Pievienot atbildi</h4>
    <div class='input-form'>
        {!! Form::open(array('url' => 'answer/store', 'method' => 'POST')) !!}
        {!! Form::textarea('answer', '', array('class'=>'form-control',
        'placeholder'=>'Atbilde')) !!}<br>
        {!! Form::text('name', '', array('class'=>'form-control', 
        'size'=>'256',
        'placeholder'=>'Vārds'))!!}<br>
        {!! Form::text('surname', '', array('class'=>'form-control', 
        'size'=>'256',
        'placeholder'=>'Uzvards'))!!}<br>
        {!! Form::hidden('question_id', $question->id, array('type'=>'hidden'))!!}
        {!! Form::submit('Pievienot atbildi', array('class'=>'btn btn-default'))!!}
        {!! Form::close() !!}
    </div>
</div>
@stop

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
            <button type="button" class="btn dropdown-toggle {{ $class }} status_{{$question->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$statusLbl}} <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a onclick="QUESTIONS.QUESTION.setStatus('0001')">Neredzams</a></li>
                <li><a onclick="QUESTIONS.QUESTION.setStatus('0002')">Redzams</a></li>
            </ul>
        </div>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle {{ $state }} state_{{$question->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <div class="question-content">{!! nl2br(e($question->question)) !!}</div>
            <span class="question-id">{{$question->id}}</span>
        </div>
    </div>
    @if (Auth::check())
    <h4>Jautājuma tēmas</h4>
    <input type="text" id="add_tags_input">
    @endif
    <hr>
    <?php if (count($answers) != 0) { ?>
        <h4>Atbildes</h4>
    <?php } else { ?>
        <h4>Šobrīd nav nevienas atbildes</h4>
    <?php } ?>
    @foreach($answers as $answer)
    <div class="answer" id="answer_{{$answer->id}}">
        <div id="answer_id_{{$answer->id}}" class="answer-content">{!! nl2br(e($answer->answer)) !!}</div>
        <div class='answer_id' id="answer_id_{{$answer->id}}">{{$answer->id}}</div>
        <div class="author">Atbildēja: <span class="answer_name">{{$answer->name }}</span>
            <span class="answer_surname">{{$answer->surname}}</span>
            <span class="answer_date">{{$answer->created_at}}</span>
        </div>
    </div>
    <br>
    @endforeach
    <br>
    @if (Auth::check())
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
    @endif
</div>
@stop

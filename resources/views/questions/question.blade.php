@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <div class="question-edit-controls">
        @if (Auth::check())
        <?php
        $class = "btn-default";
        if ($question->status == '0001') {
            $class = "btn-warning";
        }
        ?>
        <div class="btn-group question-list-status">
            <button type="button" class="btn dropdown-toggle {{ $class }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Neredzams <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Neredzams</a></li>
                <li><a href="#">Redzams</a></li>
            </ul>
        </div>
        <div class="btn-group question-list-state">
            <button type="button" class="btn dropdown-toggle {{ $class }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nevalidēts <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Nevalidēts</a></li>
                <li><a href="#">Validēts</a></li>
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
</div>
@stop

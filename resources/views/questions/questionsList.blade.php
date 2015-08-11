@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <h1>Juatājumi un atbildes</h1>
    <br>
    @foreach( $questions as $question )
    <div id="par_div">
        <div>
            <div><a href="{{url("question/$question->title/$question->id")}}">{{$question->title}}</a></div>
            <div>{{$question->created_at}}</div>
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
            @endif
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

@extends('master')
@section('header')
<title>Kontakti</title>
@stop
@section('content')
<div id="div_page_content">
    <div class="left-content">
        <h1>Sazinies ar mums</h1>
        <hr>
        <br>
        <div id="par_div">
            <div class='input-form'>
                {!! Form::open(array('url' => 'question/store', 'method' => 'POST')) !!}
                {!! Form::text('name', '', array('class'=>'form-control', 
                'size'=>'256',
                'placeholder'=>'Virsraksts'))!!}<br>
                {!! Form::textarea('question', '', array('class'=>'form-control',
                'placeholder'=>'Jautājums')) !!}<br>
                {!! Form::email('email', '', array('class'=>'form-control',
                'placeholder'=>'E-pasts'))!!}<br>            
                {!! Form::submit('Iesūtīt!', array('class'=>'btn btn-default'))!!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <div class="right-content">
        <h4>SIA "Latvijas JPAK"</h4>    
        <div>Telefona numurs: 1234567</div>
        <div>Rīga, Brīvības iela 1</div>
        <h4>E-pasts</h4>
        <div>mans@epasts.lv</div>
        </ul>
    </div>
</div>
@stop

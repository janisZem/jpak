@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">

    <div id="par_div">
        <div>
            <div><h4>{{$question->title}}</h4></div>
            <hr>
            <div>{{$question->question}}</div>
        </div>
    </div>
</div>
@stop

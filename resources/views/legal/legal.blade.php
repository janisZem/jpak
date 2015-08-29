@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <div class="left-content">
        <h1>Juridiskie pakalpojumi</h1>
        <br>
        <br>
        <div id="par_div">
            @foreach($paragraphs as $p)
            <div class="paragraph" id="{{$p->id}}">
                <h1 class="legal-h1">{!! nl2br(e($p->title)) !!}</h1>
                <p>{!! nl2br(e($p->content)) !!}</p>
                <div class="hidden" id="type_{{$p->id}}">{{$p->type}}</div>
            </div>
            <hr>
            @endforeach
        </div>
        @if (Auth::check())
        <div id="new_paragraph" class="button legal">Jauns ieraksts</div>
        @endif
    </div>
    <div class="right-content">
        <h4>Dokumentu sagataves</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s.</p>
        <ul>
            <li><a href="#">Prasības pieteikums</a></li>
            <li><a href="#">Testaments</a></li>
        </ul>
    </div>
</div>
@stop

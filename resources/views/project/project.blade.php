@extends('master')
@section('header')
<title>Projektu pieteikumi</title>
@stop
@section('content')
<div id="div_page_content">
    <div class="left-content">
        <h1>Projektu vadība</h1>
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
        <div id="new_paragraph" class="button project">Jauns ieraksts</div>
        @endif
    </div>
    <div class="right-content">
        <h4>Jautājumi</h4>    
            <li><a href="#">Kā izveidot prasības pieteikumu?</a></li>
            <li><a href="#">Kā nodibināt uzņēmumu?</a></li>
        </ul>
    </div>
</div>
@stop

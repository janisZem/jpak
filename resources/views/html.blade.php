@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    @foreach( $paragraphs as $p )
    <div class="paragraph" id="{{$p->id}}">
        <h1>{{$p->title}}</h1>
        <p>
            {{$p->content}}
        </p>
    </div>
    <br>
    @endforeach
    <div id="new_paragraph" class="button">Jauns ieraksts</div>
    <div class="div-rows">
        <div class="div-row box">
            <i class="fa fa-gavel"></i>
            <h4>Juridiskie pakalpojumi</h4>
            <hr>
            <p>
                Tiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienāiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienā
            </p>
            <a href="#">Uzzināt vairāk »</a>
        </div>
        <div class="div-row box">
            <i class="fa fa-area-chart"></i>
            <h4>Projektu vadība</h4>
            <hr>
            <p>
                Miktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienāiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienā
            </p>
            <a href="#">Uzzināt vairāk »</a>
        </div>
        <div class="div-row box">
            <i class="fa fa-question-circle"></i>
            <h4>Jautājumi & atbildes</h4>
            <hr>
            <p>
                Miktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienāiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienā
            </p>
            <a href="#">Uzzināt vairāk »</a>
        </div>
    </div>
</div>
@stop

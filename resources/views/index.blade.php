@extends('master')
@section('header')
<title>Sākums</title>
@stop
@section('content')
<div id="div_page_content">
    <div id="par_div">
        @foreach( $paragraphs as $p )
        <div class="paragraph" id="{{$p->id}}">
            <h1>{{$p->title}}</h1>
            <p>
                {{$p->content}}
            </p>
        </div>
        <br>
        @endforeach
    </div>
    @if (Auth::check())
    <div id="new_paragraph" class="button">Jauns ieraksts</div>
    @endif
    <div class="div-rows">
        <?php $i = 0; ?>
        @foreach( $rows as $row )
        <div id="edit_row_{{ $row->id}}" class="div-row box">
            <i class="fa fa-gavel"></i>
            <h4>{{ $row->title}}</h4>
            <hr>
            <p>
                {{$row->content}}
            </p>

            @foreach( $row->attrs as $attr )
            <?php
            if ($attr->name == 'ROW_URL') {
                $href = $attr->value;
            }
            if ($attr->name == 'ROW_URL_TEXT') {
                $label = $attr->value;
            }
            ?>
            @endforeach 
            <a href="{{ $href }}">
                {{ $label }}
            </a>

            <br>
            @if (Auth::check()) 
            <a id="edit_row_id_{{$row->id}}" class="edit-row"onclick="PAGE.ROW.edit(this)">Labot elementu</a>
            @endif
        </div>
        @endforeach

        <!--<div id="edit_row_1" class="div-row box">
            <i class="fa fa-gavel"></i>
            <h4>Juridiskie pakalpojumi</h4>
            <hr>
            <p>
                Tiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienāiktu robežu kā, piemēram, planētam, jo tās blīvums pakāpeniski
                eksponenciāli samazinās virzienā
            </p>            
            <a href="#">Uzzināt vairāk »</a>
            <br>
            <a id="edit_row_id_1" class="edit-row"onclick="PAGE.ROW.edit(this)">Labot elementu</a>
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
            <br>
            <a id="edit_row_id_1" class="edit-row"onclick="PAGE.ROW.edit(this)">Labot elementu</a>
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
            <a id="edit_row_id_1" class="edit-row"onclick="PAGE.ROW.edit(this)">Labot elementu</a>
            <br>
        </div> -->
    </div>
</div>
@stop

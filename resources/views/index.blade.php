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
        <div class="div-row box span3">
            <div id="edit_row_{{ $row->id}}" class="">
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
        </div>
        @endforeach

    </div>
</div>
@stop

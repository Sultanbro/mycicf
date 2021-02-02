<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'ЭДО')

@section('content')
{{--    {{print_r($arReturn)}}--}}
{{--    @foreach ($arReturn as $item)--}}
       <br>
        <div class="col-md-10" id="management-show">
            <management-show
                :results="{{ json_encode($results) }}"
                :isn="{{ Auth::user()->ISN }}"
            >
            </management-show>
        </div>
{{--    @endforeach--}}
@stop

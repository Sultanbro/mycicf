<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'ЭДО')

@section('content')
    <div class="col-md-10" id="management-show">
        <management-show
            :isn="{{ Auth::user()->ISN }}"
            :id="{{$id}}"
        >
        </management-show>
    </div>
@stop

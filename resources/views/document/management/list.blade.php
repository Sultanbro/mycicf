<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'ЭДО')

@section('content')
    <div class="col-md-10" id="management-employee">
        <management-employee
            :isn="{{ Auth::user()->ISN }}"
            :id="{{$id}}"
        >
        </management-employee>
    </div>
@stop

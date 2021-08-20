<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'ЭДО')

@section('content')
    <div class="col-md-10" id="management-main">
        <management-main
            :isn="{{ Auth::user()->ISN }}"
        >
        </management-main>
    </div>
@stop

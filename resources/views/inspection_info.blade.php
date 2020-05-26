<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'Предстраховой осмотр')

@section('content')
    <div class="col-md-10" id="inspection-info">
        <inspection-info
            :isn="{{ $isn }}"
            :argcalcisn="{{ $argcalcIsn }}"
            :agrisn="{{ $agrIsn }}"
        >
        </inspection-info>
    </div>
@stop

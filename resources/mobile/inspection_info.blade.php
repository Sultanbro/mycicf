<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layouts.main')
@section('title', 'Предстраховой осмотр')

@section('content')
    <div id="insurance-inspection">
        <inspection-info
            :isn="{{ $isn }}"
            :argcalcisn="{{ $argcalcIsn }}"
            :agrisn="{{ $agrIsn }}"
            :docisn="{{ $docIsn }}"
        >
        </inspection-info>
    </div>
@stop

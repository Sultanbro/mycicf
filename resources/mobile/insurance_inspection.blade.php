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
        <insurance-inspection
            :isn="{{ Auth::user()->ISN }}"
        >
        </insurance-inspection>
    </div>
@stop

<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

?>

@extends('layots.main')
@section('title', 'Предстраховой осмотр')

@section('content')
    <div class="col-md-10" id="insurance-inspection">
        <insurance-inspection
            :isn="{{ Auth::user()->ISN }}"
        >
        </insurance-inspection>
    </div>
@stop

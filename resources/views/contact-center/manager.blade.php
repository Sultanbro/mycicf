<?php
/** My.cic.kz */
    ?>

@extends('contact-center.main-manager')
@section('title', 'Контакт-центр')

@section('content')
    <contact-center
        :isn="{{ Auth::user()->ISN }}"
        :result="{{ json_encode($result) }}"
    >
    </contact-center>
@endsection

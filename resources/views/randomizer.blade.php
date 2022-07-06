@php
    $metaData = ['title' => 'Randomizer']
@endphp
@extends('layout')
@section('main')
    <div id="app">
        <randomizer :shelves="{{ $shelves->toJson() }}" />
    </div>
@stop

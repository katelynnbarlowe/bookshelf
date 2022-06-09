@php
    $metaData = ['title'=>$shelf->name];
@endphp
@extends('layout')
@section('main')
    <div id="app">
        <shelf title="{{$shelf->name}}" id="{{$shelf->id}}" />
    </div>
@stop

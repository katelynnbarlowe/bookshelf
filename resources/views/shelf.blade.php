@php
    $shelf = ['title'=>'Literary Fiction'];
    $metaData = ['title'=>$shelf['title']];
@endphp
@extends('layout')
@section('main')
    <div id="app">
        <shelf title="{{$shelf['title']}}" />
    </div>
@stop

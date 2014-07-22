@extends('layouts.master')

@section('content')

Art!<p>

@foreach ($featuredArts as $featuredArt)
Name: {{ $featuredArt->name }}<br>
@endforeach

@stop
@extends('layouts.master')

@section('content')

Artist: {{ $artist->name }}<p>

@foreach ($arts as $art)
    &nbsp;&nbsp;&nbsp;&nbsp;{{ HTML::linkRoute('art.byId', $art->name, array($artist->slugName(), $art->id)) }}
@endforeach

@stop
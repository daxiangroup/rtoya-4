@extends('layouts.master')

@section('content')

Artist: {{ $artist->name }}<p>
Name: {{ $art->name }}<br>
Photos:<br>
@foreach ($art->photos as $photo)
&nbsp;&nbsp;&nbsp;&nbsp;{{ $photo->path }}<br>
@endforeach

@stop
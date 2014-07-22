@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>Art</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('art::navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        Artist: {{ $artist->name }}<p>
        Name: {{ $art->name }}<br>
        Photos:<br>
        @foreach ($art->photos as $photo)
        &nbsp;&nbsp;&nbsp;&nbsp;{{ $photo->path }}<br>
        @endforeach
    </div>
</div>

@stop
@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('art::labels.art') }} - {{ Lang::get('art::labels.art.featured-artists') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('art::navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        <div class="row">
            <div class="columns small-12 medium-6">
                @foreach ($featuredArtists as $featuredArtist)
                    {{
                    HTML::linkRoute('artist.byArtistName', $featuredArtist->name, array(
                        $featuredArtist->name_slug
                    ))
                    }}<br>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
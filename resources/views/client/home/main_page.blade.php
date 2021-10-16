@extends('client.layouts.main')
@section('content')
    @include('client.home.slider')

    @include('client.home.popular_places_area')

    @include('client.home.video_area')

    @include('client.home.recent_trip_area')

    @include('client.home.travel_variation_area')

@endsection

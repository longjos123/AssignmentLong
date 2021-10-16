@extends('client.layouts.main')

@section('content')
    @include('client.tour_detail.banner')

    @include('client.tour_detail.detail_content')

    @include('client.tour_detail.popular_places_area')
@endsection

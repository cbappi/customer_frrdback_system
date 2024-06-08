@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.hotel-review.hotel-review-list')
    @include('components.hotel-review.hotel-review-delete')
    @include('components.hotel-review.hotel-review-create')
    @include('components.hotel-review.hotel-review-update')
@endsection

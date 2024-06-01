@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.resturent-review.resturent-review-list')
    @include('components.resturent-review.resturent-review-delete')
    @include('components.resturent-review.resturent-review-create')
    @include('components.resturent-review.resturent-review-update')
@endsection

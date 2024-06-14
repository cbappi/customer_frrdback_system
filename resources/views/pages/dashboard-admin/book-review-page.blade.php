@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.book-review.book-review-list')
    @include('components.book-review.book-review-delete')
    @include('components.book-review.book-review-create')
    @include('components.book-review.book-review-update')
@endsection

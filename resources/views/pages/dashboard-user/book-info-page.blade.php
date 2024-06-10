@extends('layout.sidenav-layout-user')
@section('content')
    @include('components.book-info.book-info-list')
    @include('components.book-info.book-info-delete')
    @include('components.book-info.book-info-create')
    @include('components.book-info.book-info-update')
@endsection

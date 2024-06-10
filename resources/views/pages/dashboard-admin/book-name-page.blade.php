@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.name-book.book-list')
    @include('components.name-book.book-delete')
    @include('components.name-book.book-create')
    @include('components.name-book.book-update')
@endsection

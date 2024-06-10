@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.category-book.category-list')
    @include('components.category-book.category-delete')
    @include('components.category-book.category-create')
    @include('components.category-book.category-update')
@endsection

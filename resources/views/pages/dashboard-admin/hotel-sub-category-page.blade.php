@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.category-hotel.category-list')
    @include('components.category-hotel.category-delete')
    @include('components.category-hotel.category-create')
    @include('components.category-hotel.category-update')
@endsection

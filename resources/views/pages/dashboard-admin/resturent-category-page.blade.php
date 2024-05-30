@extends('layout.sidenav-layout')
@section('content')
    @include('components.category-resturent.category-resturent-list')
    @include('components.category-resturent.category-resturent-delete')
    @include('components.category-resturent.category-resturent-create')
    @include('components.category-resturent.category-resturent-update')
@endsection

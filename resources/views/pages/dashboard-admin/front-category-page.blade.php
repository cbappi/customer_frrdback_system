@extends('layout.sidenav-layout')
@section('content')
    @include('components.category-front.category-list')
    @include('components.category-front.category-delete')
    @include('components.category-front.category-create')
    @include('components.category-front.category-update')
@endsection

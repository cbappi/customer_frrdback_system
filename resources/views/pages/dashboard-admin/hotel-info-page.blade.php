@extends('layout.sidenav-layout-admin')
@section('content')
    @include('components.hotel-info.hotel-info-list')
    @include('components.hotel-info.hotel-info-delete')
    @include('components.hotel-info.hotel-info-create')
    @include('components.hotel-info.hotel-info-update')
@endsection

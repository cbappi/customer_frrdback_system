@extends('layout.sidenav-layout-user')
@section('content')
    @include('components.hotel-info.hotel-info-list')
    @include('components.hotel-info.chotel-info-delete')
    @include('components.hotel-info.hotel-info-create')
    @include('components.hotel-info.hotel-info-update')
@endsection

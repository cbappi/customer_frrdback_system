@extends('layout.sidenav-layout-user')
@section('content')
    @include('components.resturent-info.resturent-info-list')
    @include('components.resturent-info.resturent-info-delete')
    @include('components.resturent-info.resturent-info-create')
    @include('components.resturent-info.resturent-info-update')
@endsection

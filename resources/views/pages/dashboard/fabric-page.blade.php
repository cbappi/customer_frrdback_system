@extends('layout.sidenav-layout')
@section('content')
    @include('components.fabric.fabric-list')
    @include('components.fabric.fabric-delete')
    @include('components.fabric.fabric-create')
    @include('components.fabric.fabric-update')
@endsection

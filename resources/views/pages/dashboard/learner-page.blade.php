

{{-- @extends('layout.sidenav-layout')
@section('content')
    @include('components.product.product-list')
    @include('components.product.product-delete')
    @include('components.product.product-create')
    @include('components.product.product-update')
@endsection --}}

@extends('layout.sidenav-layout')
@section('content')

    @include('components.learner.learner-list')
    @include('components.learner.learner-delete')
    @include('components.learner.learner-create')
    @include('components.learner.learner-update')
@endsection


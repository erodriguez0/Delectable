{{-- App layout template --}}
@extends('layouts.app')

{{-- Wrapper used for styling the website's background --}}
@section('body-container')
    <div class="admin-body">
@endsection

{{-- Navbar depends on user --}}
@section('navbar')
    @include('includes.admin-navbar')
@endsection

{{-- Collapsing side-nav for admins/restaurants --}}
@section('sidenav')
    @include('includes.admin-sidenav')
@endsection

{{-- Page-based content --}}
@section('content')
    <h1>{{$title}}</h1>
@endsection
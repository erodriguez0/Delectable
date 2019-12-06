@extends('layouts.app')

@section('content')
    {{-- <h1>Admin dashboard</h1> --}}
    <div class="row mx-0 dashboard">
        <div class="sidebar d-none d-md-block col-md-3 col-xl-2 bg-primary">
            <div class="fixed-side">
                <h3>Sidebar</h3>
            </div>
        </div>
        <div class="col-12 col-md-9 col-xl-10 bg-secondary">
            <h3>Dashboard</h3>
            <div class="empty-page"></div>
        </div>
    </div>
@endsection
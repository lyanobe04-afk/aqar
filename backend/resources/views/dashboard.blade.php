
@extends('layouts.app')

@section('title', 'Dashboard | Aqar Property Portal')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold" style="color: #1F4E78;">
        Dashboard Overview
    </h2>

    <p class="text-secondary">
        Welcome to Aqar Property Portal.
        Manage your properties, tenants, bookings,
        and payments from one place.
    </p>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <p class="text-secondary">Total Properties</p>
                <h2 class="fw-bold">3</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <p class="text-secondary">Planned Units</p>
                <h2 class="fw-bold">30</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <p class="text-secondary">Occupied Units</p>
                <h2 class="fw-bold">10</h2>
            </div>
        </div>
    </div>

</div>

@endsection

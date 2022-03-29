@php
function makeMock($count = 10) {
    return array_map(function () {
       return [
        'symbol' => 'NFTart',
        'value' => rand(10, 120),
        'type' => rand(1, 100) %2 == 0 ? 'buy' : 'sell',
        'filled' => rand(0, 100)
        ];
   }, array_fill(0, $count, null));
}
@endphp
@extends('layouts.panel')
@section('content')
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-start-lg" id="navbarVertical">
        <div class="container-fluid">
            <button class="navbar-toggler me-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand py-lg-2 mb-lg-3 px-lg-5 ms-0" href="#">
                <img src="{{asset('images/logo.png')}}" alt="...">
            </a>
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-house"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-wallet"></i>Wallet
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat"></i>Support
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-iteme-center me-auto">6</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-cart"></i> My NFTs
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-3 opacity-20">
                <!-- Navigation -->
                <!-- Push content down -->
{{--                <div class="mt-auto"></div>--}}
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-square"></i>Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-3">
                    <div class="row align-iteme-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Balance</span>
                                        <span class="h3 font-bold mb-0">0 ETH</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Your Last Login</span>
                                        <span class="h3 font-bold mb-0">3 hours ago</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">My Activities</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Asset</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">Transaction</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(makeMock() as $mock)
                                    <tr>
                                        <td>
                                            {{ $mock['symbol'] }}
                                        </td>
                                        <td>
                                            {{ $mock['value'] }}
                                        </td>
                                        <td>
                                        <span class="badge badge-lg badge-dot bg-{{ $mock['type'] == 'buy' ? 'success' : 'danger' }}">
                                            <span>{{ $mock['type'] == 'buy' ? 'Mint' : 'Buy' }}</span>
                                        </span>
                                        </td>
                                        <td>
                                            0x.....44
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
{{--                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>--}}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection

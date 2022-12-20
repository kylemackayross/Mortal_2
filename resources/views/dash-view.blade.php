
@extends('dashboard')

@section('content')
<div class="mx-auto max-w-lg select-none">
    <div class="text-center">
        <h3 class="text-lg font-semibold text-mo_pur">Dashboard</h3>
        <h1 class="text-4xl font-semibold">{{ Auth::user()->role }} Dashboard</h1>
        <div class="text-lg py-3">Welcome {{ Auth::user()->name }}</div>

        <div class="space-y-8 pt-10 pb-8 sm:text-left">
            @if (Auth::user()->role == "Admin")
            <div class="flex justify-between shadow-lg sm:pr-8 sm:flex-row flex-col sm:py-0 py-10 bg-mo_gra/5">
                <div class="flex items-center sm:flex-row flex-col">
                    <img src="\images\users-icon.png">
                    <div class="px-4 py-2 font-semibold text-lg">Manage Users</div>
                </div>
                <div class="flex items-center justify-center">
                    <a href="/users"><button
                            class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200">View</button></a>
                </div>
            </div>
            @endif

            <div class="flex justify-between shadow-lg sm:pr-8 sm:flex-row flex-col sm:py-0 py-10 bg-mo_gra/5">
                <div class="flex items-center sm:flex-row flex-col">
                    <img src="\images\passwords-icon.png">
                    <div class="px-4 py-2 font-semibold text-lg">Password Manager</div>
                </div>
                <div class="flex items-center justify-center">
                    <a href="/passwords"><button
                        class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200">View</button></a>
                </div>
            </div>

            {{-- @if (Auth::user()->role == "Admin" || Auth::user()->role == "Designer" || Auth::user()->role == "Tech")
            <div class="flex justify-between shadow-lg sm:pr-8 sm:flex-row flex-col sm:py-0 py-10 bg-mo_gra/5">
                <div class="flex items-center sm:flex-row flex-col">
                    <img src="\images\files-icon.png">
                    <div class="px-4 py-2 font-semibold text-lg">File manager</div>
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-2 hover:text-white hover:bg-mo_red transition duration-200">Coming Soon</button>
                </div>
            </div>
            @endif --}}

            @if (Auth::user()->role == "Admin")
            <div class="flex justify-between shadow-lg sm:pr-8 sm:flex-row flex-col sm:py-0 py-10 bg-mo_gra/5">
                <div class="flex items-center sm:flex-row flex-col">
                    <img src="\images\clients-icon.png">
                    <div class="px-4 py-2 font-semibold text-lg">Client Manager</div>
                </div>
                <div class="flex items-center justify-center">
                    <a href="/clients"><button
                        class="text-mo_red font-semibold ring-2 ring-mo_red py-2 px-10 hover:text-white hover:bg-mo_red transition duration-200">View</button></a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

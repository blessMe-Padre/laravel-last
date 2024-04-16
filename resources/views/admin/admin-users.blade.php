<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="admin-wrapper">

        <!-- LEFT -->
        <div class="admin-wrapper-left">
            <a href="{{route('admin-reviews')}}" class="menu-item">Отзывы</a>
            <a href="{{route('admin-users')}}" class="menu-item">Пользователи</a>
        </div>

        <!-- RIGHT -->

        <div class="px-4">
            <form id="liveSearchForm" method="POST" action="{{ route('live-search-search') }}" class="inline-flex gap-4 mt-10 mb-10"
            role="search">
                @csrf
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search"
                    id="searchInput" name="s2">
            </form>

            <ul id="searchResults">
                @foreach ($users as $user)
                    <p>Имя пользователя: {{ $user->name }}</p>
                @endforeach
            </ul>
        </div>
        
    </div>    
</x-app-layout>
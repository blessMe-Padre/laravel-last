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

        <div>

        </div>
        
    </div>    
</x-app-layout>
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
            @foreach ($users as $el)
                <div class="border p-3 m-3 flex items-center gap-3">
                    <h2 class="">Имя: {{ $el->name }}</h2>
                    <p class="">Почта: {{ $el->email }}</p>
                    <p class="">Тип пользователя: {{ $el->usertype }}</p>
                </div>
            @endforeach
        </div>
        
    </div>    
    

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

     <div class="admin-wrapper">

        <!-- LEFT -->
        <div class="admin-wrapper-left">
            <a href="{{route('admin-reviews')}}" class="menu-item">Отзывы</a>
            <a href="/" class="menu-item">Пользователи</a>
        </div>

        <!-- RIGHT -->
        <div class="p-8">
                <p class="text-white font-bold text-4xl mb-3">
                    {{ __("You're logged as Admin!") }}
                </p>

                <p class="text-white text-2xl mb-3">Выберите что хотели бы отредактировать в левом меню</p>
            
        </div>
        
    </div>    
    

</x-app-layout>

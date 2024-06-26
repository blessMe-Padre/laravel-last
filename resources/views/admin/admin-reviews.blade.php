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
            @foreach ($reviews as $review)
                <div class="border p-3 m-3">
                    <h2 class="mb-2">{{ $review->name }}</h2>
                    <p class="mb-2">{{ $review->email }}</p>
                    <p class="mb-2">{{ $review->message }}</p>
                    <a href="{{ route('admin-reviews-edit', $review->id) }}" class="btn btn-success">Редактировать</a>
                    <a href="{{ route('admin-reviews-delete', $review->id) }}" class="btn btn-danger">Удалить</a>
                </div>
            @endforeach
        </div>
        
    </div>    
    

</x-app-layout>
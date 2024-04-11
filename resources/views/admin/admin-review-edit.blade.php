<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <div class="alert alert-info" role="alert">
            {{ __("You're logged as Admin!") }}
        </div>
    </div>

    <div class="admin-wrapper">

        <!-- LEFT -->
        <div class="admin-wrapper-left">
            <button class="menu-item">Отзывы</button>
        </div>

        <!-- RIGHT -->
        <div class="py-4 px-5">
            <h2>Редактировать отзыв</h2>
            <br>
            <hr>

            <form method="POST" action="{{route('admin-reviews-submit', $data->id)}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" id="name"
                        placeholder="Введите ваше имя">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email адрес</label>
                    <input type="email" value="{{ $data->email }}" name="email" class="form-control" id="email"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Сообщение</label>
                    <textarea class="form-control" name="message" id="message" rows="3">{{ $data->message }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>

    </div>


</x-app-layout>
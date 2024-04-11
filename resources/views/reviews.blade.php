@extends('layout')

@section('title')
    Отзывы
@endsection

@section('main_content')
    <h1>Отзывы</h1>

    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>

    <h2>Форма добавления отзыва</h2>
    <form method="POST" action="/reviews/check">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email адрес</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Отправить отзывы</button>
    </form>

    <br>
    <hr>
    <h2>Все отзывы</h2>
    <br>
    <ul class="grid grid-cols-3 gap-5">
        @foreach ($reviews as $el)
            <li class="p-4 border rounded-lg">
                <h3 class="text-xl mb-2">{{ $el->name }}</h3>
                <p class="text-slate-300 mb-2">{{ $el->email }}</p>
                <p class="mb-4">{{ $el->message }}</p>

                <a href="{{ route('review-one', $el->id) }}" class="btn btn-success">Подробнее</a>
            </li>
        @endforeach
    </ul>
    <div class="p-7">
        {{$reviews->links()}}
    </div>
@endsection
@extends('layout')

@section('title')
Письмо
@endsection

@section('main_content')
<h1 class="mb-3">Написать письмо</h1>

    <form method="POST" action="{{route('send-email-post')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Отправить отзывы</button>
    </form>
@endsection
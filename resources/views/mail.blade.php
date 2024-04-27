@extends('layout')

@section('title')
Написать письмо
@endsection

@section('main_content')
<h1 class="mb-3">Написать письмо</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('send-email-post')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Тема письма</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Введите тему письма">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Отправить письмо</button>
    </form>
@endsection
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
            <input type="text" name="name" class="form-control" id="name" placeholder="Введите ваше имя" value="{{ old('name') }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Почта</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Введите вашу почту" value="{{ old('email') }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Тема письма</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Введите тему письма" value="{{ old('subject') }}">
            <span class="text-danger">{{ $errors->first('subject') }}</span>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input type="tel" name="phone" class="form-control" id="phone" placeholder="+7900000000" value="{{ old('phone') }}">
            <span class="text-danger">{{ $errors->first('phone') }}</span>

        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            <span class="text-danger">{{ $errors->first('message') }}</span>

        </div>

        <button type="submit" class="btn btn-success">Отправить письмо</button>
    </form>
@endsection
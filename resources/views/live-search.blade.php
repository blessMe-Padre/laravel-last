@extends('layout')

@section('title')
    Живой поиск 
@endsection

@section('main_content')
    <h1 class="mb-3">Живой поиск</h1>

    @foreach ($users as $user)
      <p>Имя пользователя: {{$user->name}}</p>  
            <ul class="mb-4">
                @foreach ($user->reviews as $review)
                    <li class="ps-4">отзыв:  "{{$review->message}}"</li>
                @endforeach
            </ul>
    @endforeach


@endsection
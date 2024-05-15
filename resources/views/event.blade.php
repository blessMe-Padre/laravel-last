@extends('layout')

@section('title')
Мероприятия
@endsection

@section('main_content')
<h1 class="mb-3">Страница Мероприятия № {{ $id }}</h1>

<div class="inner">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, ex.</p>
    <img src="{{ Vite::asset('resources/img/image.jpg') }}" alt="" />
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, ex.</p>
</div>
@endsection
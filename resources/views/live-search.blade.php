@extends('layout')

@section('title')
    Живой поиск 
@endsection

@section('main_content')
    <h1 class="mb-3">Живой поиск</h1>

    <form id="liveSearchForm" method="POST" action="{{ route('live-search-search') }}" class="inline-flex gap-4 mt-10 mb-10"
        role="search">
        @csrf
        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search"
            id="searchInput" name="s2">
            <button class="btn btn-danger" type="submit">Отправить</button>
    </form>

    <div id="searchResults">
        @foreach ($users as $user)
            <p>Имя пользователя: {{ $user->name }}</p>
        @endforeach
    </div>

@endsection
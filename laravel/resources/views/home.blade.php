@extends('layout.app')

@section('title', 'Пульт')

@section('content')
  <main class="main-home">
    <div class="main-home__container">
        <h1>Главная</h1>

        <div class="main-home__button-container">
          @include('partials.button')
          @include('partials.button')
          @include('partials.button')
          @include('partials.button')
        </div>
    </div>
  </main>
@endsection
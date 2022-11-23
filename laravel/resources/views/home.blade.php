@extends('layout.app')

@section('title', 'Пульт')

@section('content')
  <main class="main-home">
    <div class="main-home__container">
        <h1>Главная</h1>
        
        <div class="main-home__button-container main-home__button-container-js">
          @for ($i = 0; $i < 16; $i++)
            @include('partials.button', ['id' => $i + 1])
          @endfor
        </div>
    </div>
  </main>
@endsection
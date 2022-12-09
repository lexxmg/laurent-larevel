@extends('layout.app')

@section('title', 'Настройки')

@section('content')

@include('partials.header')

  <main class="main-home">
    <div class="main-home__container">
      @auth('web')

        @include('partials.icon')
        
      @endauth

      @guest('web')
          <h1>Вы не авторизованы</h1>
      @endguest
    </div>
  </main>
@endsection
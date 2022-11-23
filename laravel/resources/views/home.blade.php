@extends('layout.app')

@section('title', 'Пульт')

@section('content')
  <main class="main-home">
    <div class="main-home__container">
        <h1>Главная</h1>
        
        <div class="main-home__button-container main-home__button-container-js">
          @foreach ($arr as $item)
            @include('partials.button', [
              'id' => $item['id'],
              'stat' => $item['stat'],
              'type' => $item['type']
            ])
          @endforeach
        </div>
    </div>
  </main>
@endsection
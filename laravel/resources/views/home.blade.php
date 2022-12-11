@extends('layout.app')

@section('title', 'Пульт')

@section('content')

@include('partials.header')

  <main class="main-home">
    <div class="main-home__container">
      @auth('web')

        <div class="main-home__button-container main-home__button-container-js">
          @foreach ($arr as $item)
            @include('partials.button', [
              'id' => $item['id'],
              'out' => $item->gpio['out'],
              'stat' => $item->gpio['out'],
              'type' => $item->gpio['type'],
              'mode' => $item->mode['name'],
              'icon' => $item->icon['name'],
              'revers' => $item['revers'],
              'name' => $item['name'],
              'laurent_id' => $item['laurent_id'],
              'laurentOn' => $item->laurent['on']
            ])
          @endforeach
        </div>
      @endauth

      @guest('web')
          <h1 class="main-home__guest-title">Вы не авторизованы</h1>

          <div class="main-home__guest-inner-container">
            <div class="main-home__guest-img-container">
              <img class="main-home__guest-img" 
                src="{{ asset('images/access_denied.jpeg') }}" 
                alt="access-denied"
              >
            </div>
          </div>
      @endguest
    </div>
  </main>
@endsection
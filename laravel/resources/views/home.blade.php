@extends('layout.app')

@section('title', 'Пульт')

@section('content')
  <main class="main-home">
    <div class="main-home__container">
        <h1>Авторизованный пользователь</h1>
        
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

        @include('partials.icon')
    </div>
  </main>
@endsection
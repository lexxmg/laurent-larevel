@extends('layout.admin')

@section('title', 'Админ-панель')

@section('content')
    @include('admin.partials.header')

    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1>Главная</h1>

        <div class="main-content main__button-container main-home__button-container-js">
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
      </div>
    </main>
@endsection
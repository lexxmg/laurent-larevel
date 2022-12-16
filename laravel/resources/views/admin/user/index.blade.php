@extends('layout.admin')

@section('title', 'Пользователеи')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Пользователеи</h1>

        <div class="token-container">
          @foreach ($users as $item)
            <p>{{ $item->name }}</p>

            <form action="{{ route('admin.user.destroy', $item->id) }}" method="post">
              @csrf
              @method('DELETE')

              <button>Удалить</button>
            </form>

            <form action="{{ route('admin.user.show', $item->id) }}" method="post">
              @csrf
              @method('GET')

              <button>Редактировать</button>
            </form>
          @endforeach
        </div>
      </div>  
    </main>
@endsection

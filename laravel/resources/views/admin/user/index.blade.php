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
            <div class="user-card">
              <div class="user-card__user-container">
                <span class="user-card__text">{{ $item->name }}</span>
                <span class="user-card__text">{{ $item->device_name}}</span>
                <span class="user-card__text">{{ $item->created_at}}</span>
              </div>
              
              <div class="user-card__btn-container">
                <form class="user-card__form" action="{{ route('admin.user.show', $item->id) }}" method="post">
                  @csrf
                  @method('GET')

                  <button class="user-card__btn">Редактировать</button>
                </form>

                <form class="user-card__form" action="{{ route('admin.token.create.process') }}" method="post">
                  @csrf
                  <input type="hidden" name="userId" value="{{ $item->id }}">
                  <button class="user-card__btn user-card__btn--red">Перерегистрировать</button>
                </form>

                <form class="user-card__form" action="{{ route('admin.user.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')

                  <button class="user-card__btn user-card__btn--red">Удалить</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>  
    </main>
@endsection

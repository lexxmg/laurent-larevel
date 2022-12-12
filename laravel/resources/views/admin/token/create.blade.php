@extends('layout.admin')

@section('title', 'Админ-панель')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1>Новый пользователь</h1>

        <div class="register-link register-link__container">
          <form class="register-link__form" action="{{ route('admin.token.create.process') }}" method="POST">
            @csrf
        
            @foreach ($outs as $item)
              <div class="register-link__iner">
                <div class="register-link__input-container">
                  <label class="register-link__label" for="{{ $item->id }}">{{ $item->name }}</label>
                  <input class="register-link__input" 
                    id="{{ $item->id }}"
                    type="checkbox"
                    name="outs[]"
                    value="{{ $item->id }}"
                  >
                </div>
        
                <div class="register-link__text-container">
                  <span class="register-link__text">{{ $item->laurent->name }}</span>
                </div>
              </div>
            @endforeach
        
            <button class="register-link__btn">Получить ссылку</button>
          </form>
        </div>  
    </main>
@endsection

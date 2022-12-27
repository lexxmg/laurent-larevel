@extends('layout.admin')

@section('title', 'Новый-пользователь')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Редактировать пользователя</h1>

        <h2>
          <span class="main__content-container__subtitle-text">{{ $user->name }}</span>
          <span class="main__content-container__subtitle-text">{{ $user->device_name }}</span>
        </h2>

        <div class="register-link register-link__container register-link-js">
          <form class="register-link__form" action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            @foreach ($outs as $item)
              <div class="register-link__card-container">
                <div class="register-link__inner">
                  <i class="register-link-icon {{ $item->icon->name }}"></i>
                  <div class="register-link__inner-column">
                    <div class="register-link__input-container">
                      <label class="register-link__label" for="{{ $item->id }}">{{ $item->name }}</label>
                      <input class="register-link__input visually-hidden" 
                        id="{{ $item->id }}"
                        type="checkbox"
                        name="outs[]"
                        value="{{ $item->id }}"
                        @if ($item->user->find($user->id))
                          checked="checked"
                        @endif
                      >
                    </div>
            
                    <div class="register-link__text-container">
                      <span class="register-link__text">{{ $item->laurent->name }}</span>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        
            <div class="register-link__btn-container">
              <button class="register-link__btn">Применить</button>
            </div>
          </form>
        </div>  
    </main>
@endsection

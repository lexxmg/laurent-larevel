@extends('layout.admin')

@section('title', 'Создать АЦП')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Создать АЦП</h1>
      
        <div class="outs-create-out__container">
          <form class="outs-create-out__form outs-create-out-form" 
            action="{{ route('admin.outs.store') }}"
            method="POST"
          >
            @csrf
            @method('POST')

            <input type="hidden" name="gpioId" value="{{ $gpioId }}">

            <div class="outs-create-out-form__inner-input">
              <input class="outs-create-out-form__input" type="text" name="name" id="name">
              <label for="name" class="outs-create-out-form__label">Имя выхода</label>
            </div>

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="laurent">
                @foreach ($laurents as $item)
                    <option class="outs-create-out-form__option" value="{{ $item->id }}">
                      {{ $item->name }}
                    </option>
                @endforeach
              </select>
            </div>

            <div class="outs-create-out-form__inner-btn">
              <button class="outs-create-out-form__btn">Создать</button>
              <a class="outs-create-out-form__btn" href="{{ route('admin.outs.index') }}">Отменить</a>
            </div>
          </form>
        </div>
      </div>  
    </main>
@endsection
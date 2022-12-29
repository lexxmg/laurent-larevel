@extends('layout.admin')

@section('title', 'Создать выход')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Создать выход c обратной связью</h1>

        <div class="outs-create-out__container">
          <form class="outs-create-out__form outs-create-out-form" 
            action="{{ route('admin.outs.create') }}"
            method="POST"
          >
            @csrf
            @method('GET')

            <input type="hidden" name="gpio" value="{{ $gpioId }}">

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="outCount">
                <option class="outs-create-out-form__option" value="1">
                  с одним выходом
                </option>

                <option class="outs-create-out-form__option" value="2">
                  с двумя выходами
                </option>
              </select>
            </div>
            
            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="type">
                <option class="outs-create-out-form__option" value="out">
                  out
                </option>
                
                <option class="outs-create-out-form__option" value="relle">
                  relle
                </option>
              </select>
            </div>

            <div class="outs-create-out-form__inner-btn">
              <button class="outs-create-out-form__btn">Далее</button>
              <a class="outs-create-out-form__btn" href="{{ route('admin.outs.index') }}">Отменить</a>
            </div>
          </form>
        </div>
      </div>
    </main>
@endsection

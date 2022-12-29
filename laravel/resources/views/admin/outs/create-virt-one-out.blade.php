@extends('layout.admin')

@section('title', 'Создать выход')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Создать выход или реле</h1>

        <div class="outs-create-out__container">
          <form class="outs-create-out__form outs-create-out-form" 
            action="{{ route('admin.outs.store') }}"
            method="POST"
          >
            @csrf
            @method('POST')

            <input type="hidden" name="gpioId" value="{{ $gpioId }}">
            <input type="hidden" name="virt_type" value="out">
            <input type="hidden" name="outCount" value="1">

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

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="icon">
                @foreach ($icons as $item)
                    <option class="outs-create-out-form__option" value="{{ $item->id }}">
                      {{ $item->description }}
                    </option>
                @endforeach
              </select>
            </div>

            <div class="outs-create-out-form__inner-input">
              <label for="virt_on" class="outs-create-out-form__label">Выход OUT на включение и выключение</label>
              <select class="outs-create-out-form__select" name="virt_on" id="virt_on">
                <option class="outs-create-out-form__option" value="1">
                  OUT-1
                </option>
                <option class="outs-create-out-form__option" value="2">
                  OUT-2
                </option>
                <option class="outs-create-out-form__option" value="3">
                  OUT-3
                </option>
                <option class="outs-create-out-form__option" value="4">
                  OUT-4
                </option>
                <option class="outs-create-out-form__option" value="5">
                  OUT-5
                </option>
                <option class="outs-create-out-form__option" value="6">
                  OUT-6
                </option>
                <option class="outs-create-out-form__option" value="7">
                  OUT-7
                </option>
                <option class="outs-create-out-form__option" value="8">
                  OUT-8
                </option>
                <option class="outs-create-out-form__option" value="9">
                  OUT-9
                </option>
                <option class="outs-create-out-form__option" value="10">
                  OUT-10
                </option>
                <option class="outs-create-out-form__option" value="11">
                  OUT-11
                </option>
                <option class="outs-create-out-form__option" value="12">
                  OUT-12
                </option>
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

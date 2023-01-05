@extends('layout.admin')

@section('title', 'Редактировать выход')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Редактировать выход или реле</h1>

        <div class="outs-create-out__container">
          <form class="outs-create-out__form outs-create-out-form" 
            action="{{ route('admin.outs.update', $id) }}"
            method="POST"
          >
            @csrf
            @method('PUT')

            <div class="outs-create-out-form__inner-input">
              <label for="name" class="outs-create-out-form__label">Имя выхода:</label>

              <input class="outs-create-out-form__input"
                type="text"
                name="name"
                id="name"
                value="{{ $currentName }}"
              >
            </div>

            <div class="outs-create-out-form__inner-check">
              <label class="outs-create-out-form__label-check">Реверс:
                <input class="outs-create-out-form__check" 
                  type="checkbox"
                  name="rev"
                  @if ($currentRev == 1)
                      checked
                  @endif
                >
              </label>
            </div>

            <div class="outs-create-out-form__inner-check">
              <label class="outs-create-out-form__label-check">Подтверждение:
                <input class="outs-create-out-form__check" 
                  type="checkbox" name="confirm"
                  @if ($currentConfirm == 1)
                      checked
                  @endif
                >
              </label>
            </div>

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="laurent">
                @foreach ($laurents as $item)
                    <option class="outs-create-out-form__option"
                      value="{{ $item->id }}"
                      @if ($item->id === $currentLaurentId)
                          selected
                      @endif
                    >
                      {{ $item->name }}
                    </option>
                @endforeach
              </select>
            </div>

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="icon">
                @foreach ($icons as $item)
                    <option class="outs-create-out-form__option"
                      value="{{ $item->id }}"
                      @if ($item->id === $currentIcon)
                          selected
                      @endif
                    >
                      {{ $item->description }}
                    </option>
                @endforeach
              </select>
            </div>

            <div class="outs-create-out-form__inner-input">
              <select class="outs-create-out-form__select" name="mode">
                @foreach ($modes as $item)
                    <option class="outs-create-out-form__option"
                      value="{{ $item->id }}"
                      @if ($item->id === $currentMode)
                          selected
                      @endif
                    >
                      {{ $item->description }}
                    </option>
                @endforeach
              </select>
            </div>

            <div class="outs-create-out-form__inner-btn">
              <button class="outs-create-out-form__btn">Применить</button>
              <a class="outs-create-out-form__btn" href="{{ route('admin.outs.index') }}">Отменить</a>
            </div>
          </form>
        </div>
      </div>  
    </main>
@endsection

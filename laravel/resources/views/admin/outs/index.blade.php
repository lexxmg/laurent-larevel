@extends('layout.admin')

@section('title', 'Выходы')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Выходы Laurent</h1>

        <div class="outs-index">
          <div class="outs-index__create-form-container outs-index-create-form-container">
            <h2 class="outs-index-create-form-title">Добавить кнопку:</h2>

            <form class="outs-index-create-form-container__form" 
              action="{{ route('admin.outs.create') }}"
              method="POST"
            >
              @csrf
              @method('GET')
              <select class="outs-index-create-form-container__select" name="gpio">
                @foreach ($gpio as $item)
                  <option class="outs-index-create-form-container__foption"
                    value="{{ $item->id }}">{{ $item->description }}
                  </option>
                @endforeach
              </select>

              <button class="outs-index__btn">Далее</button>
            </form>
          </div>

          
          @foreach ($outs as $item)
            <div class="outs-index__card outs-index-card">
              <div class="outs-index-card__content-container">
                <span class="outs-index-card__text">{{ $item->name }}</span>
                <span class="outs-index-card__text">{{ $item->laurent->name }}</span>
              </div>

              <div class="outs-index-card__btn-container">
                <form class="outs-index-card__form"
                  action="{{ route('admin.outs.destroy', $item->id) }}"
                  method="POST"
                >
                  @csrf
                  @method('DELETE')

                  <button class="outs-index__btn outs-index__btn--red">Удалить</button>
                </form>

                <form class="outs-index-card__form"
                  action="{{ route('admin.outs.update', $item->id) }}"
                  method="POST"
                >
                  @csrf
                  @method('PUT')

                  <button class="outs-index__btn outs-index__btn--margin">Редактировать</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </main>
@endsection

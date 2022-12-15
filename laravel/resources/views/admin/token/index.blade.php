@extends('layout.admin')

@section('title', 'Токены')

@include('admin.partials.header')

@section('content')
    <main class="main">
      <div class="main__nav-container">
        @include('admin.partials.nav')
      </div>

      <div class="main__content-container">
        <h1 class="main__title">Не использованные токены</h1>

        <div class="token-container">
          @foreach ($tokens as $item)
            <div class="token__item token-item">
              <div class="token-item__content">
                <span class="token-item__text">{{ url("register/$item->token") }}</span>
                <span class="token-item__text">{{ $item->created_at }}</span>
              </div>

              <div class="token-item__buttons">
                <form class="token-item__form" 
                    action="{{ route('admin.token.destroy', $item->id) }}"
                    method="POST"
                  >
                  @csrf
                  @method('DELETE')

                  <button class="token-item__btn">Удалить</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>
      </div>  
    </main>
@endsection
